<div class="white-card">
    <h2>Menuitem Manager</h2>
    <div class="component-action-bar">
        <a href="index.php?component=menu&controller=newitem&menu_id=<?php echo $_GET["id"]; ?>" class="button green-button"><i class="fa fa-plus"></i> New Menu Item</a><a class="delete-by-ids button red-button"><i class="fa fa-trash"></i> Delete</a>
    </div>
    <form action="index.php?component=menu&controller=menuitems&task=delete&id=<?php echo $_GET["id"]; ?>" method="post" class="admin-form">
        <div class="d-flex admin-header">
            <div class="col-md-1">&nbsp;</div>
            <div class="col-md-1"><strong>ID</strong></div>
            <div class="col-md-4"><strong>Title</strong></div>
            <div class="col-md-3"><strong>Type</strong></div>
            <div class="col-md-1" style="text-align: center;"><strong>Published</strong></div>
            <div class="col-md-2"><strong>&nbsp;</strong></div>
        </div>
        <?php foreach ($this->model->items as $item) { ?>
            <div class="d-flex admin-list align-items-center">
                <div class="col-md-1" style="text-align: center;">
                    <input type="checkbox" name="ids[]" value="<?php echo $item->id; ?>" />
                </div>
                <div class="col-md-1">
                    <?php echo $item->id; ?>
                </div>
                <div class="col-md-4">
                    <a href="index.php?component=menu&controller=menuitem&id=<?php echo $item->id; ?>&menu_id=<?php echo $item->menu_id; ?>"><?php echo $item->title; ?></a>
                </div>
                <div class="col-md-3">
                    <?php echo $item->component; ?> - <?php echo $item->controller; ?>
                </div>
                <div class="col-md-1" style="text-align: center;">
                    <a href="index.php?component=menu&controller=menuitem&task=<?php echo ($item->published == 1 ? "unpublish" : "publish"); ?>&id=<?php echo $item->id; ?>&menu_id=<?php echo $item->menu_id; ?>" class="btn btn-<?php echo ($item->published == 1 ? "success" : "danger"); ?>">
                        <i class="fa fa-<?php echo ($item->published == 1 ? "check" : "times"); ?>"></i>
                    </a>
                </div>
                <div class="col-md-2" style="text-align: right;">
                    <a href="index.php?component=menu&controller=menuitem&id=<?php echo $item->id; ?>&menu_id=<?php echo $item->menu_id; ?>" class="button"><i class="fa fa-edit"></i> Edit Item</a>
                </div>
            </div>
            <?php foreach ($item->children as $child) { ?>
                <div class="d-flex admin-list align-items-center">
                    <div class="col-md-1" style="text-align: center;">
                        <input type="checkbox" name="ids[]" value="<?php echo $child->id; ?>" />
                    </div>
                    <div class="col-md-1">
                        <?php echo $child->id; ?>
                    </div>
                    <div class="col-md-4">
                        <a href="index.php?component=menu&controller=menuitem&id=<?php echo $child->id; ?>&menu_id=<?php echo $child->menu_id; ?>">---- <?php echo $child->title; ?></a>
                    </div>
                    <div class="col-md-3">
                        <?php echo $child->component; ?> - <?php echo $child->controller; ?>
                    </div>
                    <div class="col-md-1" style="text-align: center;">
                        <a href="index.php?component=menu&controller=menuitem&task=<?php echo ($child->published == 1 ? "unpublish" : "publish"); ?>&id=<?php echo $child->id; ?>&menu_id=<?php echo $child->menu_id; ?>" class="btn btn-<?php echo ($child->published == 1 ? "success" : "danger"); ?>">
                            <i class="fa fa-<?php echo ($child->published == 1 ? "check" : "times"); ?>"></i>
                        </a>
                    </div>
                    <div class="col-md-2" style="text-align: right;">
                        <a href="index.php?component=menu&controller=menuitem&id=<?php echo $child->id; ?>&menu_id=<?php echo $child->menu_id; ?>" class="button"><i class="fa fa-edit"></i> Edit Item</a>
                    </div>
                </div>
                <?php foreach ($child->children as $grandchild) { ?>
                    <div class="d-flex admin-list align-items-center">
                        <div class="col-md-1" style="text-align: center;">
                            <input type="checkbox" name="ids[]" value="<?php echo $grandchild->id; ?>" />
                        </div>
                        <div class="col-md-1">
                            <?php echo $grandchild->id; ?>
                        </div>
                        <div class="col-md-4">
                            <a href="index.php?component=menu&controller=menuitem&id=<?php echo $grandchild->id; ?>&menu_id=<?php echo $grandchild->menu_id; ?>">-------- <?php echo $grandchild->title; ?></a>
                        </div>
                        <div class="col-md-3">
                            <?php echo $grandchild->component; ?> - <?php echo $grandchild->controller; ?>
                        </div>
                        <div class="col-md-1" style="text-align: center;">
                            <a href="index.php?component=menu&controller=menuitem&task=<?php echo ($grandchild->published == 1 ? "unpublish" : "publish"); ?>&id=<?php echo $grandchild->id; ?>&menu_id=<?php echo $grandchild->menu_id; ?>" class="btn btn-<?php echo ($grandchild->published == 1 ? "success" : "danger"); ?>">
                                <i class="fa fa-<?php echo ($grandchild->published == 1 ? "check" : "times"); ?>"></i>
                            </a>
                        </div>
                        <div class="col-md-2" style="text-align: right;">
                            <a href="index.php?component=menu&controller=menuitem&id=<?php echo $grandchild->id; ?>&menu_id=<?php echo $grandchild->menu_id; ?>" class="button"><i class="fa fa-edit"></i> Edit Item</a>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
        <?php } ?>
    </form>
</div>