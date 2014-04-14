<?php
class fnc
{
    public static function mpr($array)
    {
          echo  "<pre>";
            print_r($array);
           echo  "</pre>";
          
    }
    
    public static function getRealWord($number,$string_for_1='день',$string_for_2='дня',$string_for_6='дней')
    {
      

        if($number<=20)
        {
            switch ($number)
            {
                case 1:
                $number .= ' '.$string_for_1; 
                break;                   
                case 2:
                $number .= ' '.$string_for_2; 
                break;
                case 3:
                $number .= ' '.$string_for_2; 
                break;
                case 4:
                $number .= ' '.$string_for_2; 
                break;
                default:
                $number .= ' '.$string_for_6; 
                break;
            }
        }
        else
        {
            switch (substr($number,0,-1))
            {
                case 1:
                $number .= ' '.$string_for_1; 
                break;
                case 5:
                $number .= ' '.$string_for_1; 
                break;
                case 2:
                $number .= ' '.$string_for_2; 
                break;
                case 3:
                $number .= ' '.$string_for_2; 
                break;
                case 4:
                $number .= ' '.$string_for_2; 
                break;
                default:
                $number .= ' '.$string_for_6; 
                break;
            }
        }
        return $number;
    }
    
    
    public static function saveIMG($file_name,$root,$model,$wish_name='')
    {          
        if($wish_name=='')
        {
            if ($file_name != '')
            {
              
                $pngjpggif = substr($file_name, -4);
                if ($pngjpggif == '.png' || $pngjpggif == '.gif' || $pngjpggif == '.jpg')
                {
                    $file_name = md5(md5($file_name) . md5(time()));
                    $file_name = $file_name . $pngjpggif;


                    $model->img = CUploadedFile::getInstance($model, 'img');


if(is_object($model))
                    $model->img->saveAs($root . $file_name);
           
                    Yii::import('ext.phpthumb.EasyPhpThumb');
                    $thumbs = new EasyPhpThumb();
                    $thumbs->init();
                    $thumbs->setThumbsDirectory('/'.$root);
               
                    $thumbs
                    ->load($_SERVER["DOCUMENT_ROOT"].Yii::app()->request->baseUrl.'/'.$root.$file_name)
                    
                    ->resize(800,800)
                    ->save($file_name, strtoupper(substr($pngjpggif,1)));
                    $model->img = $file_name;
                          
                } else
                    throw new CHttpException(404, 'Неправильный формат изображения!');

            }
            else unset($model->img);
            return $model;
        }
        else
        {
            if ($file_name != '')
            {
              
                $pngjpggif = substr($file_name, -4);
                if ($pngjpggif == '.png' || $pngjpggif == '.gif' || $pngjpggif == '.jpg')
                {
                    
                    $file_name = $wish_name . $pngjpggif;


                    $model->alt_name = CUploadedFile::getInstance($model, 'img');



                    $model->alt_name->saveAs($root . $file_name);
           
                    Yii::import('ext.phpthumb.EasyPhpThumb');
                    $thumbs = new EasyPhpThumb();
                    $thumbs->init();
                    $thumbs->setThumbsDirectory('/'.$root);
               
                    $thumbs
                    ->load($_SERVER["DOCUMENT_ROOT"].Yii::app()->request->baseUrl.'/'.$root.$file_name)
                    
                    ->resize(18,13)
                    ->save($file_name, strtoupper(substr($pngjpggif,1)));
                    $model->alt_name = $file_name;
                          
                } else
                    throw new CHttpException(404, 'Неправильный формат изображения!');

            }
            else unset($model->alt_name);
            return $model;
        }
            
    }
    
    
    public static function getThumb($folders,$file_name,$w=false,$h=false,$q=90)
    {
        $way_to_library = "/lib/thumb/phpThumb.php?src=/";
        if(is_numeric($w)) $w = "&w=$w";
        else $w='';
        if(is_numeric($h)) $h = "&h=$h";
        else $h='';        
        $q = "&q=$q";
        
        return  $way_to_library.$folders.$file_name.$w.$h.$q;
    }
    
    public static function gerRelationTable($n=false)
    {
        $list = array('none'=>'Не привязывать','gallery'=>"Галерею",'href'=>'Внешняя ссылка','notes'=>'Страницу');
        if(is_numeric($n))
        {
            return $list[$n];
        }
        else return $list;
    }
    
    public static function getCalendarDay($date)
    {
        $list_mounth = array('Jan'=>'Января','Feb'=>'Февраля','Mar'=>'Марта','Apr'=>'Апреля','May'=>'Мая','Jun'=>'Июня','Jul'=>'Июля','Aug'=>'Августа','Sep'=>'Сентября','Oct'=>'Октября','Nov'=>'Ноября','Dec'=>'Декабря');
        $month = date('M',strtotime($date));
        $month = $list_mounth[$month];
        $day =  date('d',strtotime($date));
        $year =  date('Y',strtotime($date));
        return $day.' '.$month.' '.$year;
    }
    
    
    public static function crop_str($string, $limit)
    {
     
        $substring_limited = substr($string,0, $limit);        //режем строку от 0 до limit
         
        return substr($substring_limited, 0, strrpos($substring_limited, ' ' ));    //берем часть обрезанной строки от 0 до последнего пробела
     
    }   
    
    public static function getCategoryService($id=false)
    {
        $list = array('ППР','ППРк','ТК','Векторизация');
        if(is_numeric($id))
            return $list[$id];
        else return $list;
    }
    
    public static function getCategoryServiceEng($id=false)
    {
        $list = array('pprs','pprk','tk','vektor');
        if(is_numeric($id))
            return $list[$id];
        else return $list;
    }
}
?>