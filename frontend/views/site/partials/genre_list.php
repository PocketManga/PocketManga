<div class="h-100 radi-all-15 background-color3">
    <div class="pt-4"> 
        <?php if($Categories) { foreach($Categories as $Category) { ?>
            <a href="#"><p class="text-color1 mb-0 ml-4 mr-4 br-word bold"><?=$Category->Name ?></p></a>
        <?php }} ?>
    </div>
</div>