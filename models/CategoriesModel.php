<?php

class CategoriesModel extends Database{
    
    private $db;
    private $tabel;
    private $port;

    public function __construct(){
        $this->db = new Database();
        $this->db = $this->db->connect();
        $this->tabel = $this->prefix . 'categories';
        $this->port = $this->prefix . 'portfolio';
    }

   public function insert_category($name_en,$name_ar,$slug, $parent_id = 0){
        $query = "
            INSERT INTO $this->tabel (name_en,name_ar,slug, parent_id) VALUES (?,?,?,?)
        ";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$name_en,$name_ar,$slug,$parent_id]);
   }

   public function get_category($slug = ''){

        $slug = ( $slug == '' ) ? '' : ' AND slug = ' . $slug;
        $query = "
            SELECT * FROM $this->tabel WHERE id != 0 $slug
        ";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

   }


   public function check_names($name_en,$name_ar){
        $query = "
            SELECT id FROM $this->tabel WHERE name_en = ? OR name_ar = ?
        ";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$name_en,$name_ar]);
        if( $stmt->rowCount() > 0 ){
            return true;
        }

        return false;

   }

   // all cats will get all categories even not assigned to port
   // all-ports will get all assigned portfolios
   public function get_category_product( $cat_slug = '', $p_slug = '' , $group = false , $get = 'all-cats' , $limit = '' , $order = '' , $page = '', $except = ''){

    
        $offset = ( $page != '' && $limit != '' ) ? ' OFFSET ' . ($page-1)*$limit: '';

        $cat_slug   = filter_var($cat_slug,FILTER_SANITIZE_STRING);
        $p_slug     = filter_var($p_slug,FILTER_SANITIZE_STRING);
    
        $and = '';
        $cat_slug   = ( $cat_slug == '' ) ? '' : ' AND c.slug = "' . $cat_slug . '"';
        $p_slug     = ( $p_slug == false ) ? '' : ' AND p.port_slug = "' . $p_slug . '"';
        $limit      = ( $limit == '' ) ? '' : ' LIMIT ' . $limit;
        $order      = ( $order == '' ) ? 'ORDER BY p.id DESC' : ' ORDER BY ' . $order;
        $except     = ( $except == '' ) ? '' : ' AND p.port_slug != "' . $except .'"';

        $group = ( $group == '' ) ? '' : 'GROUP BY c.id';
        $count = ( $group == '' ) ? '' : ',COUNT(p.title_en) as total';
        $get = ( $get == 'all-cats' ) ? 'LEFT' : 'RIGHT';

        $and = $cat_slug . $p_slug . $except;

        $query = "
            SELECT c.id as cat_id,c.name_en,c.name_ar,c.slug as cat_slug,r.name_en as parent_name_en, r.name_ar as parent_name_ar,r.id as parent_id,r.slug as parent_slug,p.* $count
            FROM $this->tabel c
            $get JOIN $this->port p ON c.slug = p.cat_id
            LEFT JOIN $this->tabel r ON c.parent_id = r.id
            WHERE c.id != 0 $and
            $group
            $order $limit $offset
            
        ";
        
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
   }
    

   public function update_category($en,$ar,$id){
    $query = " UPDATE $this->tabel SET name_en = ?, name_ar = ? WHERE slug = ?";
    $stmt = $this->db->prepare($query);
    return $stmt->execute([$en,$ar,$id]);

}


    public function insert_portfolio($port_slug,$category_slug,$title_en,$title_ar,$desc_en,$desc_ar,$status,$photos,$panorma,$date){
        // search for slug
        $query = "
            SELECT id FROM $this->port WHERE port_slug = ?
        ";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$port_slug]);
        if( $stmt->rowCount() > 0 ){
            $this->update_portfolio($port_slug,$category_slug,$title_en,$title_ar,$desc_en,$desc_ar,$status,$photos,$panorma);
            return;
        }
        $query = "
            INSERT INTO $this->port ( port_slug,cat_id,title_en,title_ar,description_en,description_ar,status,photos,panorama,date ) VALUES ( ?,?,?,?,?,?,?,?,?,? )
        ";

        $stmt = $this->db->prepare($query);
        return $stmt->execute([$port_slug,$category_slug,$title_en,$title_ar,$desc_en,$desc_ar,$status,$photos,$panorma,$date]);
    }
    public function update_portfolio($port_slug,$category_slug,$title_en,$title_ar,$desc_en,$desc_ar,$status,$photos,$panorma){
        $query = "
            UPDATE $this->port SET cat_id = ?, title_en = ?, title_ar = ?, description_en = ?, description_ar = ?, status = ?, photos = ?, panorama = ? WHERE port_slug = ?
        ";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$category_slug,$title_en,$title_ar,$desc_en,$desc_ar,$status,$photos,$panorma,$port_slug]);
    }


    public function update_photos($port_slug,$photos){
        $query = "
            UPDATE $this->port SET photos = ? WHERE port_slug = ?
        ";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$photos,$port_slug]);
    }


    public function delete_proj($slug){
        $query = "
            DELETE FROM $this->port WHERE port_slug = ? 
        ";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$slug]);
    
    }


    public function total_views(){
        $query = "
            SELECT SUM(views) as total_views FROM $this->port; 
        ";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function total_projects(){
        $query = "
            SELECT id FROM $this->port
        ";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function increase_view( $slug, $old_views){
        $views = $old_views + 1;
        $query = "
            UPDATE $this->port SET views = ? WHERE port_slug = ?
        ";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$views, $slug]);
    }


    public function update_love($slug,$like,$status){
        $query = "
            UPDATE $this->port SET likes = ? WHERE port_slug = ?
        ";
        $stmt = $this->db->prepare($query);
        if($stmt->execute([$like, $slug])){
            update_like_session($slug,$status);
        }
    }

}