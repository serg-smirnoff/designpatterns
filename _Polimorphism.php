<?php

abstract class Publication
{
    // таблица, в которой хранятся данные по элементу
    protected $table;

    // свойства элемента нам неизвестны
    protected $properties = array();

    // конструктор
    public function __construct($id)
    {
        // обратите внимание, мы не знаем, из какой таблицы нам нужно получить данные
        $result = mysql_query ('SELECT * FROM `'.$this->table.'` WHERE `id`="'.$id.'" LIMIT 1');
        // какие мы получили данные, мы тоже не знаем
        $this->properties = mysql_fetch_assoc($result);
    }

    // метод, одинаковый для любого типа публикаций, возвращает значение свойства
    public function get_property($name)
    {
        if (isset($this->properties[$name]))
            return $this->properties[$name];

        return false;
    }

    // метод, одинаковый для любого типа публикаций, устанавливает значение свойства
    public function set_property($name, $value)
    {
        if (!isset($this->properties[$name]))
            return false;

        $this->properties[$name] = $value;

        return $value;
    }

    // а этот метод должен напечатать публикацию, но мы не знаем, как именно это сделать, и потому объявляем его абстрактным
    abstract public function do_print();
}

//Производные классы

//Теперь можно перейти к созданию производных классов, которые и реализуют недостающую функциональность.

class News extends Publication
{
    // конструктор класса новостей, производного от класса публикаций
    public function __construct($id)
    {
        // устанавливаем значение таблицы, в которой хранятся данные по новостям
        $this->table = 'news_table';
        // вызываем конструктор родительского класса
        parent::__construct($id);
    }
    
    // переопределяем абстрактный метод печати
    public function do_print()
    {
        echo $this->properties['title'];
        echo '<br /><br />';
        echo $this->properties['text'];
        echo '<br />Источник: '.$this->properties['source'];
    }
}

class Announcement extends Publication
{
    // конструктор класса объявлений, производного от класса публикаций
    public function __construct($id)
    {
        // устанавливаем значение таблицы, в которой хранятся данные по объявлениям
        $this->table = 'announcements_table';
        // вызываем конструктор родительского класса
        parent::__construct($id);
    }
    
    // переопределяем абстрактный метод печати
    public function do_print()
    {
        echo $this->properties['title'];
        echo '<br />Внимание! Объявление действительно до '.$this->properties['end_date'];
        echo '<br /><br />'.$this->properties['text'];
    }
}

class Article extends Publication
{
    // конструктор класса статей, производного от класса публикаций
    public function __construct($id)
    {
        // устанавливаем значение таблицы, в которой хранятся данные по статьям
        $this->table = 'articles_table';
        // вызываем конструктор родительского класса
        parent::__construct($id);
    }
    
    // переопределяем абстрактный метод печати
    public function do_print()
    {
        echo $this->properties['title'];
        echo '<br /><br />';
        echo $this->properties['text'];
        echo '<br />&copy; '.$this->properties['author'];
    }
}

//Теперь об использовании

//Суть в том, что один и тот же код используется для обьектов разных классов.

// наполняем массив публикаций объектами, производными от Publication
$publications[] = new News($news_id);
$publications[] = new Announcement($announcement_id);
$publications[] = new Article($article_id);

foreach ($publications as $publication) {
    // если мы работаем с наследниками Publication
    if ($publication instanceof Publication) {
        // то печатаем данные
        $publication->do_print(); 
    } else {
        // исключение или обработка ошибки
    }
}


?>