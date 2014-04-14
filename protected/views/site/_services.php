<?foreach ($services as $service)
{
    $uri = '/category/index/type/'.fnc::getCategoryServiceEng($service->id_category);
    $link = CHtml::link(fnc::getCategoryService($service->id_category), array($uri));
    $cnt = $service->cost;
    echo "<div class='service''>$link<span>($cnt)</span></div>";
}?>