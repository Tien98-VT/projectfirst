<?php

function showError($errors, $name){
    if($errors->has($name)){
       return  '<div class="alert alert-danger" style="margin-top: 3px">
                    '.$errors->first($name).'
        </div>';
    }
}

function getCategory($mang, $parent, $char,$id_selected){

	foreach($mang as $value){
		if($value['parent_id'] === $parent){
            if($value['id'] == $id_selected){
                echo '<option value="'.$value['id'].'" selected>'.$char.$value['name'].'</option>';
            }else{
				echo '<option value="'.$value['id'].'">'.$char.$value['name'].'</option>';
			}
			getCategory($mang, $value['id'], $char.'--|',$id_selected);
		}
	}
}


function listCategory($mang, $parent, $char){

	foreach($mang as $value){
		if($value['parent_id'] === $parent){
            echo '<div class="item-menu"><span>'.$char.$value['name'].'</span>
                <div class="category-fix">
                    <a class="btn-category btn-primary" href="'.route('category.edit',['id'=>$value['id']]).'"><i class="fa fa-edit"></i></a>
                    <a class="btn-category btn-danger"  href="'.route('category.delete',['id'=>$value['id']]).'"><i class="fas fa-times"></i></i></a>
                </div>
            </div>';
			listCategory($mang, $value['id'], $char.'--|');
		}
	}
}



