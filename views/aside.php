<div class="container">
    <div class="row">
    <div class="col-sm-12">
        <div class="category">
            <ul >
                <?php
                include_once('models/M_category.php');
                $f = new category();
                $c1 = $f->getCategoryByParent(0);
                foreach($c1 as $value1):
                    $c2 = $f -> getCategoryByParent($value1['id']);
                    if(count($c2)>0){
                ?>
                    <li class="menucha"><a href="#"><?= $value1['category_name'];?></a>
                        <ul class="trencung">
                            <?php foreach($c2 as $value2):?>
                            <li class="menucon">
                                <a href="<?= $routing->site_url("san-pham/".$value2['slug']);?>">
                                <?php echo $value2['category_name'];?></a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                    <?php 
                    }
                    else{
                        echo"<li><a href='".$routing->site_url("san-pham/".$value1['slug'])."'>". $value1['category_name']."</a></li>";
                    }
                endforeach;
                ?>
            </ul>
        </div>
        </div>
    </div>
</div>

