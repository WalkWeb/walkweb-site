<?php

$this->title = APP_NAME . ' — Функционал проекта';

?>

<h1><?= $this->title ?></h1>

<p>Пояснение по цветовому выделению:</p>

<ul>
    <li>нет выделения — функционал не готов</li>
    <li><span class="green">зеленый</span> — функционал готов</li>
    <li><span class="orange">оранжевый</span> — функционал есть, но требует доработок</li>
</ul>

<div class="line_box"><div class="line_row"><div class="line_left"></div><div class="line_right"></div><div class="line_center">&nbsp;</div></div></div>


<h2>Пользователи</h2>

<ul>
    <li><span class="orange">Регистрация</span></li>
    <li><span class="orange">Подтверждения email</span></li>
    <li>Восстановление пароля</li>
    <li>Изменение пароля</li>
    <li><span class="green">Авторизация</span></li>
    <li><span class="green">Умная авторизация (с переадресацией на изначальную страницу)</span></li>
    <li><span class="green">Выход</span></li>
    <li><span class="green">Энергия</span></li>
    <li><span class="green">Уровень</span></li>
    <li><span class="orange">Уведомления</span></li>
    <li><span class="green">Страница пользователя</span></li>
    <li>Установка своего аватара (для высокоуровневых пользователей)</li>
    <li>Смена отображаемого имени (для высокоуровневых пользователей)</li>
</ul>

<h2>Личный кабинет</h2>

<ul>
    <li><span class="green">Профиль</span></li>
    <li>Функционал увеличения энергии</li>
    <li>Функционал увеличения места на диске</li>
    <li>Список своих постов</li>
    <li>Список своих комментариев</li>
    <li><span class="green">Список событий</span></li>
    <li>Страница настроек</li>
</ul>

<h2>Посты</h2>

<ul>
    <li><span class="orange">Просмотр постов</span></li>
    <li><span class="orange">Добавление постов</span></li>
    <li>Редактирование постов</li>
    <li><span class="green">Изменение рейтинга чужих постов</span></li>
    <li>Получение опыта за создание поста</li>
    <li>Повышение статуса поста при получении определенного количества лайков и получение дополнительного опыта автору поста</li>
    <li>Увеличение функционала при создании постов с ростом уровня аккаунта</li>
    <li>Черновик</li>
    <li>Создание поста на основе чистого html</li>
    <li>Добавление уведомления автору посту при добавлении комментария его посту. Группировка таких уведомлений</li>
    <li>Голосования в постах</li>
    <li>Загрузка сразу нескольких картинок</li>
    <li>Добавление ссылок</li>
    <li>Выделение текста (курсив, жирный, зачеркнутый)</li>
    <li>Цитаты</li>
    <li>Вложения</li>
    <li>Таблицы</li>
</ul>

<h2>Теги</h2>

<ul>
    <li>Добавление постам тегов</li>
    <li>Страницы тегов</li>
    <li>Поиск по тегам</li>
</ul>

<h2>Комментарии</h2>

<ul>
    <li>Просмотр комментариев в посте</li>
    <li><i>На подумать: несколько вариантов вывода постов: деревом, списком</i></li>
    <li>Добавление комментария</li>
    <li>Редактирование комментария</li>
    <li>Изменение рейтинга чужих комментариев</li>
    <li>Уведомление автору комментария при добавлении ответа на его комментарий</li>
    <li>Прикрепление к комментарию изображение</li>
</ul>

<h2>Сообщества</h2>

<ul>
    <li>Создание сообщества</li>
    <li>Подписка на сообщество</li>
    <li>Функционал привязки постов к сообществу</li>
    <li>Функционал получения особой валюты создателю сообщества при новых подписчиках</li>
</ul>

<h2>Темы (база языков программирования)</h2>

<ul>
    <li>Создание темы (добавление языка программирования)</li>
    <li>Отметка языка программирования любимым</li>
    <li>График выходов языков</li>
    <li>Поиск по языкам</li>
</ul>

<h2>Рейтинги</h2>

<ul>
    <li>Рейтинги пользователей по уровню аккаунта</li>
    <li>Рейтинги пользователей по карме</li>
    <li>Рейтинг профессий</li>
    <li>Рейтинг языков программирования</li>
    <li>Рейтинг сообществ</li>
</ul>

<h2>Чат</h2>

<p><i>Пока под вопросом</i></p>

<h2>Прочее</h2>

<ul>
    <li><span class="orange">Возможность менять шаблон сайта</span></li>
    <li><span class="orange">Общая статистика портала</span></li>
    <li>Поиск по постам</li>
    <li>Поиск по языкам программирования</li>
    <li>Поиск по сообществам</li>
    <li>Адаптивная верстка для мобильных устройств</li>
    <li>Добавить мультиязычность</li>
</ul>

<h2>Админка</h2>

<ul>
    <li>Функционал бана пользователей</li>
    <li>Функционал бана пользователя с опцией «твинк» — в этом случае все лайки с такого поста будут обнулены</li>
    <li>Функционал создания новой эры (обнуление всех рейтингов)</li>
    <li>Одобрение тегов и установка для них иконок</li>
    <li>Одобрение пользовательских аватаров</li>
    <li>Страница для просмотра новых, не проверенных постов и комментариев, с кнопкой их одобрения или бана пользователя</li>
</ul>

<h2>Панель модератора</h2>

<ul>
    <li>Страница для просмотра новых, не проверенных постов и комментариев, с кнопкой их одобрения или бана пользователя</li>
</ul>

<h2>Безопасность</h2>

<ul>
    <li>Защита от перебора паролей</li>
    <li>Защита от перебора авторизационного токена</li>
    <li>Защита от регистрации с временных почтовых ящиков</li>
    <li><span class="green">Защита от csrf-атак</span></li>
    <li>Функционал для выявления твинко-аккаунтов</li>
    <li>Закрытие тяжелых страниц только для авторизованных пользователей</li>
    <li>Защита от спам-запросов</li>
</ul>
