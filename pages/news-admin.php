
<button class="btn toggleFiles">
    Show Files
</button>

<div class="files hidden">

    <table>
        <thead>
        <tr>
            <th>Thumbnail</th>
            <th>File Name</th>
            <th>Action</th>
        </tr>
        </thead>

        <tbody>
        <?php foreach ($app->content as $index => $filename) : ?>
        <tr>
            <td><img src="public/uploads/<?= $filename ?>" height="50px" alt=""/></td>
            <td><?= $filename ?></td>
            <td><a href="?p=news-admin&action=deleteFile&filename=<?= $filename ?>"><i class="material-icons">delete</i></a></td>
        </tr>
        <?php endforeach; ?>

        </tbody>
    </table>
    <hr>

</div>
<div class="row">

    <?php if(!empty(\app\controller\NewsController::getContent())) : ?>

    <?php
        /**
         * @var \app\objects\News $newsObj
         */
        foreach (\app\controller\NewsController::getContent()["all"] as $key => $newsObj) : ?>
            <div class="col s12 m4">
                <div class="card sticky-action"">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="<?= (file_exists(__UPLOADDIR__ . $newsObj->getNewsImage()) ) ? __UPLOADDIR__ . $newsObj->getNewsImage() : __UPLOADDIR__ . "placeholder.jpg" ?>">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4"><?= $newsObj->getNewsTitle() ?><i class="material-icons right">more_vert</i></span>
                        <p><?= date("d.m.y - H:i", strtotime($newsObj->getNewsCreated())) ?> Uhr</p>
                    </div>
                    <div class="card-action">
                        <a href="?p=news-admin&amp;action=delete&amp;id=<?= $newsObj->getNewsId()  ?>" class="btn btn-floating red "><i class="material-icons">delete</i></a> <a href="?p=news-admin&amp;action=edit&amp;id=<?= $newsObj->getNewsId()  ?>#edit" class="btn-floating btn yellow"><i class="material-icons">edit</i></a>
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

<h2>News Edit & Save</h2>


    <!-- TODO : LEARN! REMEMBER! -->
    <form action="?p=news-admin&action=<?= (!isset($_GET["action"])) ? "insert" : "edit&id=" . $_GET["id"] ?>#edit" method="post" enctype="multipart/form-data" id="edit">

        <div class="row">
            <div class="input-field s12">
                <input id="news_title" type="text" name="news[news_title]" value="<?= (isset(\app\controller\NewsController::getContent()["edit"])) ? \app\controller\NewsController::getContent()["edit"]->getNewsTitle() : "" ?>" class="validate">
                <label for="news_title">Titel</label>
            </div>
            <div class="input-field s12">
                <textarea id="news_text" type="text" name="news[news_text]"  class="materialize-textarea validate"><?= (isset(\app\controller\NewsController::getContent()["edit"])) ? \app\controller\NewsController::getContent()["edit"]->getNewsText() : "" ?></textarea>
                <label for="news_text">News</label>
            </div>
            <div class="file-field input-field">
                <div class="btn">
                    <span>Neues Bild</span>
                    <input type="file" value="" name="news[news_file]">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" value="<?= (isset(\app\controller\NewsController::getContent()["edit"])) ? \app\controller\NewsController::getContent()["edit"]->getNewsImage() : "" ?>" name="news[old_news_file]" type="text">
                </div>
            </div>
            <div class="row center">
                <input type="submit" class="btn" name="news[submit]" value="Speichern">
            </div>
        </div>

    </form>

