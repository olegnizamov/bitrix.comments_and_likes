Модуль реализует функционал комментариев и лайков для элементов инфоблока битрикс.
Привязка идет по ID элемента.

Пример использования компонента:

```
$APPLICATION->IncludeComponent(
    "onizamov:comments",
    "",
    [
        "CONTENT_ID" => "1",
    ]
);

$APPLICATION->IncludeComponent(
    'onizamov:likes',
    '',
    [
        'NEWS_ID' => 1,
        'TOGGLE' => 'Y',
    ]
);
```

Доработки:

1. Перенести редактор текста и лайски в расширения
2. Почистить код, изменить нейминги сущностей.
3. Доработать код для изменения данных
4. Сделать установку из модуля.