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
        return $stmt->fetchAll();

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
   public function get_category_product( $cat_slug = '', $p_slug = '' , $group = false , $get = 'all-cats' , $limit = '' , $order = '' , $page = '', $except = '' , $status = ''){

    
        $offset = ( $page != '' && $limit != '' ) ? ' OFFSET ' . ($page-1)*$limit: '';

        $cat_slug   = filter_var($cat_slug,FILTER_SANITIZE_STRING);
        $p_slug     = filter_var($p_slug,FILTER_SANITIZE_STRING);
    
        $and = '';
        $cat_slug   = ( $cat_slug == '' ) ? '' : ' AND c.slug = "' . $cat_slug . '"';
        $p_slug     = ( $p_slug == false ) ? '' : ' AND p.port_slug = "' . $p_slug . '"';
        $limit      = ( $limit == '' ) ? '' : ' LIMIT ' . $limit;
        $order      = ( $order == '' ) ? 'ORDER BY p.id DESC' : ' ORDER BY ' . $order;
        $except     = ( $except == '' ) ? '' : ' AND p.port_slug != "' . $except .'"';
        $status     = ( $status == '' ) ? '' : ' AND p.status = "'. $status .'"';

        $group = ( $group == '' ) ? '' : 'GROUP BY c.id';
        $count = ( $group == '' ) ? '' : ',COUNT(p.title_en) as total';
        $get = ( $get == 'all-cats' ) ? 'LEFT' : 'RIGHT';

        $and = $cat_slug . $p_slug . $except . $status;

        $query = "
            SELECT c.id as cat_id,c.id as category_id,c.name_en,c.name_ar,c.slug as cat_slug,r.name_en as parent_name_en, r.name_ar as parent_name_ar,r.id as parent_id,r.slug as parent_slug,p.* $count
            FROM $this->tabel c
            $get JOIN $this->port p ON c.slug = p.cat_id
            LEFT JOIN $this->tabel r ON c.parent_id = r.id
            WHERE c.id != 0 $and
            $group
            $order $limit $offset
            
        ";
        
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
   }
    

   public function update_category($en,$ar,$id,$parent_id = 0){
    $query = " UPDATE $this->tabel SET name_en = ?, name_ar = ?, parent_id = ? WHERE slug = ?";
    $stmt = $this->db->prepare($query);
    return $stmt->execute([$en,$ar, $parent_id,$id]);

}


    public function insert_portfolio($port_slug,$category_slug,$title_en,$title_ar,$desc_en,$desc_ar,$status,$photos,$panorma,$date,$videos){
        // search for slug
        $query = "
            SELECT id FROM $this->port WHERE port_slug = ?
        ";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$port_slug]);
        if( $stmt->rowCount() > 0 ){
            $this->update_portfolio($port_slug,$category_slug,$title_en,$title_ar,$desc_en,$desc_ar,$status,$photos,$panorma,$videos);
            return;
        }
        $query = "
            INSERT INTO $this->port ( port_slug,cat_id,title_en,title_ar,description_en,description_ar,status,photos,panorama,date,videos ) VALUES ( ?,?,?,?,?,?,?,?,?,?,? )
        ";

        $stmt = $this->db->prepare($query);
        return $stmt->execute([$port_slug,$category_slug,$title_en,$title_ar,$desc_en,$desc_ar,$status,$photos,$panorma,$date,$videos]);
    }
    public function update_portfolio($port_slug,$category_slug,$title_en,$title_ar,$desc_en,$desc_ar,$status,$photos,$panorma,$videos){
        $query = "
            UPDATE $this->port SET cat_id = ?, title_en = ?, title_ar = ?, description_en = ?, description_ar = ?, status = ?, photos = ?, panorama = ?, videos = ? WHERE port_slug = ?
        ";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$category_slug,$title_en,$title_ar,$desc_en,$desc_ar,$status,$photos,$panorma,$videos,$port_slug]);
    }


    public function update_photos($port_slug,$photos,$is_panorama = false){
        $set = ( $is_panorama ) ? 'panorama' : 'photos';
        $query = "
            UPDATE $this->port SET $set = ? WHERE port_slug = ?
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

    public function getSimilarProjects($project){
        $result = [];
        $query = "
            SELECT id,photos,title_en,title_ar,photos,date,likes,port_slug FROM $this->port 
            WHERE cat_id = ? AND id != ?
            AND status = 1
        ";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$project['cat_slug'], $project['id']]);
        $result = $stmt->fetchAll();
        if($stmt->rowCount() <= 2 ){
            // get latest projects
            // execlude prev ones
            
            $execluded = '';
            $ex = [];
            foreach($result as $pro){
                array_push($ex , $pro['id']);
            }
            if(count($ex) > 0){
                $execluded = ' AND id NOT IN ( ';
                for($i = 0; $i < count($ex);$i++){
                    $comma = ' , ';
                    if($i == count($ex)-1){
                        $comma = '';
                    }
                    $execluded .= $ex[$i] . $comma;
                }
                $execluded .= ' )';
            }
            $query = "
                SELECT id,photos,title_en,title_ar,photos,date,likes,port_slug FROM $this->port 
                WHERE status = 1 AND port_slug != ? $execluded
                ORDER BY id desc LIMIT 4
            ";
            $stmt = $this->db->prepare($query);
            $stmt->execute([$project['port_slug']]);
            if($stmt->rowCount() > 0){
                // check for duplicates
                $result2 = $stmt->fetchAll();
                
                $result =  array_merge($result , $result2);
            }
        }
        return $result;
    }

    public function getAllCats($cat_slug = ''){
        // gets all categories inside
        $parents = [];
        $directChilds = [];
        $allChildCats = [];
        $currentCat = [];

        // get parents
        $query = "
            SELECT id,name_en,name_ar,slug FROM $this->tabel
            WHERE parent_id = 0
        ";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $parents = $stmt->fetchAll();

        // get childs
        if($cat_slug != ''){
            $query = "
                SELECT id,name_en,name_ar,slug FROM $this->tabel WHERE slug = ? LIMIT 1
            ";
            $stmt = $this->db->prepare($query);
            $stmt->execute([$cat_slug]);
            if($stmt->rowCount() > 0){
                $currentCat = $stmt->fetch();
                
                $query = "
                    SELECT c2.id AS child1id, c2.name_en AS child1name_en,c2.name_ar AS child1name_ar,c2.slug AS child1slug, c3.id AS child2id, c3.name_en AS child2name_en, c3.name_ar AS child2name_ar,c3.slug AS child2slug, c4.id AS child3id, c4.name_en AS child3name_en, c4.name_ar AS child3name_ar,c4.slug AS child3slug FROM $this->tabel c1 LEFT JOIN $this->tabel c2 ON c2.parent_id = c1.id LEFT JOIN $this->tabel c3 ON c3.parent_id = c2.id LEFT JOIN $this->tabel c4 ON c4.parent_id = c3.id WHERE c1.id = ?
                ";
                $stmt = $this->db->prepare($query);
                $stmt->execute([$currentCat['id']]);
                if($stmt->rowCount() > 0){
                    // set data
                    foreach($stmt->fetchAll() as $row){
                        if($row['child1id'] != null){
                            $directChilds[] = [
                                'id' => $row['child1id'],
                                'name_en' => $row['child1name_en'],
                                'name_ar' => $row['child1name_ar'],
                                'slug' => $row['child1slug']
                            ];
                        }
                        if($row['child2id'] != null){
                            $allChildCats[] = [
                                'id' => $row['child2id'],
                                'name_en' => $row['child2name_en'],
                                'name_ar' => $row['child2name_ar'],
                                'slug' => $row['child2slug']
                            ];
                        }
                        if($row['child3id'] != null){
                            $allChildCats[] = [
                                'id' => $row['child3id'],
                                'name_en' => $row['child3name_en'],
                                'name_ar' => $row['child3name_ar'],
                                'slug' => $row['child3slug']
                            ];
                        }
                    }
                }
            }
            
        }

        return [
            'parents' => $parents,
            'directChilds'  => $directChilds,
            'allChildCats'  => $allChildCats,
            'currentCat'  => $currentCat
        ];
    }

    public function getProductsAllWithSubChilds($options, $page , $limit){
        $list_of_categories = [];
        foreach($options->directChilds as $direct){
            $list_of_categories[] = $direct->slug;
        }
        foreach($options->allChildCats as $childs){
            $list_of_categories[] = $childs->slug;
        }
        if(isset($options->currentCat->slug)){
            $list_of_categories[] = $options->currentCat->slug;
        }
        if(count($list_of_categories) > 0){
            // get projects in these slugs categories
            $slugs = ' AND cat_id IN ( ';
            foreach($list_of_categories as $cat){
                $slugs .=  $cat . ', ';
            }
            $slugs .= '0 )';
        }else{
            // get latest projects
            $slugs = '';
        }
        $offset =  'OFFSET ' . ($page-1)*$limit;
        $query = "
            SELECT id,title_en,title_ar,port_slug,photos,date,likes
            FROM $this->port WHERE status = 1 $slugs ORDER BY RAND() desc LIMIT $limit $offset
        ";
        
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
        
    }
}