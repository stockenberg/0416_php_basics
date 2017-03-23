<div class="row">

    <?php
    if(!empty(\app\controller\NewsController::getContent())) :

        /**
         * @var \app\objects\News $newsObj
         */
        foreach (\app\controller\NewsController::getContent()["all"] as $key => $newsObj) : ?>
        <div class="col s12 m4">
            <div class="card">
                <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="public/uploads/<?= $newsObj->getNewsImage() ?>">
                </div>
                <div class="card-content">
                    <span class="card-title activator grey-text text-darken-4"><?= $newsObj->getNewsTitle() ?><i class="material-icons right">more_vert</i></span>
                    <p><?= date("d.m.y - H:i", strtotime($newsObj->getNewsCreated())) ?> Uhr</p>
                </div>
                <div class="card-reveal">
                    <span class="card-title grey-text text-darken-4"><?= $newsObj->getNewsTitle() ?><i class="material-icons right">close</i></span>
                    <p><?= $newsObj->getNewsText() ?></p>
                </div>
            </div>
        </div>
    <?php endforeach;
    endif; ?>

</div>
