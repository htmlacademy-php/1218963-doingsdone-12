<section class="content__side">
    <h2 class="content__side-heading">Проекты</h2>

    <nav class="main-navigation">
        <ul class="main-navigation__list">
            <?php foreach ($arrayProjects as $project):?>

            <li class="main-navigation__list-item">
                <a class="main-navigation__list-item-link" href="#"><?= $project['name']; ?></a>
                <span class="main-navigation__list-item-count">
                    <?=getTasksCount($arrayTasks, $project['name'])?>
                </span>
            </li>
            <?php endforeach; ?>
        </ul>
    </nav>

    <a class="button button--transparent button--plus content__side-button" href="pages/form-project.html"
        target="project_add">Добавить проект</a>
</section>

<main class="content__main">

    <h2 class="content__main-heading">Список задач</h2>

    <form class="search-form" action="index.php" method="post" autocomplete="off">
        <input class="search-form__input" type="text" name="" value="" placeholder="Поиск по задачам">

        <input class="search-form__submit" type="submit" name="" value="Искать">
    </form>

    <div class="tasks-controls">
        <nav class="tasks-switch">
            <a href="/" class="tasks-switch__item tasks-switch__item--active">Все задачи</a>
            <a href="/" class="tasks-switch__item">Повестка дня</a>
            <a href="/" class="tasks-switch__item">Завтра</a>
            <a href="/" class="tasks-switch__item">Просроченные</a>
        </nav>

        <label class="checkbox">
            <!--добавить сюда атрибут "checked", если переменная $show_complete_tasks равна единице-->

            <input class="checkbox__input visually-hidden show_completed" type="checkbox" <?=($show_complete_tasks === 1 ? "checked" : "");
                            ?>>
            <span class="checkbox__text">Показывать выполненные</span>
        </label>
    </div>

    <table class="tasks">
        <?php foreach ($arrayTasks as $task):

                        if ($show_complete_tasks === 0 && $task['isDone']) {
                            continue;
                        }?>

        <tr class="tasks__item task <?= getImportantTask($task['date']) ? "task--important" : "" ?> <?= $task['isDone'] ?  "task--completed" : "" ?>">
            <td class="task__select">
                <label class="checkbox task__checkbox">
                    <input class="checkbox__input visually-hidden" type="checkbox" <?php if ($task['isDone']):?> checked
                        <?php endif?>>
                    <span class="checkbox__text"><?= $task['name']; ?></span>
                </label>
            </td>
            <td class="task__date"><?= $task['date']; ?></td>
            <td class="task__controls"></td>
        </tr>

        <?php endforeach; ?>

    </table>
</main>