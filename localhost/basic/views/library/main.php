<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

  <div class="jumbotron">
    <h1>Добро пожаловать!</h1>

    <p class="lead">Курсовая работа по предмету: "Инструментальные средства информационных систем".</p>

    <p class="lead">Выполнил: Рудианов Алексей Иванович.</p>

    <p class="lead">Проверила: Ступина Мария Валерьевна.</p>

    <p class="lead">В данной курсовой работе нужно было выполнить даталогическое и физическое проектирование базы данных информационной системы библиотеки вуза.</p>


  </div>

  <div class="body-content" >

    <div class="row">

      <div class="col-lg-3">
        <h2>Главная</h2>

        <p>Главная страница с информацией о курсовой.</p>

        <p><a class="btn btn-success" href="/">Главная</a></p>
      </div>

      <div class="col-lg-3">
        <h2>Таблицы</h2>

        <p>Административная часть с таблицами.</p>

        <p><a class="btn btn-success" href="/admin/book">Таблицы</a></p>
      </div>
      <div class="col-lg-3">
        <h2>Запросы</h2>

        <p>Пользовательская часть с запросами.</p>

        <p><a class="btn btn-success" href="/requests/request1">Запросы</a></p>
      </div>
      <div class="col-lg-3">
        <h2>Регистрационная форма</h2>

        <p>Форма входа и регистрации.</p>

        <p><a class="btn btn-success" href="/login">Вход</a></p>
      </div>
    </div>

  </div>

  <div class="jumbotron">
    <h3>При проектировании соблюдал следующие принципы:</h3>

    <p class="lead">•	Структура таблиц и ограничений ссылочной целостности должны адекватно отражать текущее состояние предметной области.</p>

    <p class="lead">•	Следует избегать каскадного удаления в тех случаях, когда это может привести к нежелательной потере информации.
      Где это уместно, следует использовать значения по умолчанию.</p>

      <p class="lead">•	Продуманное определение обязательных полей (NOT NULL), с одной стороны, не даст возможности ввести информацию,
        которая может вызвать неправильное функционирование приложения, а, с другой стороны, позволит ускорить ввод данных.</p>

        <p class="lead">•	Структура индексов должна соответствовать информационным потребностям пользователей, эксплуатирующих систему,
          обеспечивая быстрое выполнение запросов к базе данных из разрабатываемого приложения. </p>

          <p class="lead">•	Изменение состояния предметной области и задачи, решаемые приложением, являются определяющими при выборе того,
            какие индексы использовать: простые или составные, допускающими или нет повторяющиеся значения.</p>

            <p class="lead">В качестве инструмента проектирования использовал MySQL, phpMyadmin,
              Draw.io, Atom. В качестве СУБД для разработки физической модели данных использовал MySQL.</p>


            </div>

          </div>
