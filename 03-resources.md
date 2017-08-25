# Resources
Resources 是一个 (数据集合|单数据) 对象，配合输出格式模板 `Transformer` 来转换数据并输出。

有两种类型的 Resources：
    * League\Fractal\Resource\Item - 单数据资源
    * League\Fractal\Resource\Collection - 数据集合资源

参数解释：
* 两种资源构造器 `第一个参数` 都是接受 (数据集合|单数据)，`第二个参数` 接受一个 `Transformer`。
* 第一个参数: 可以是一个数组集合，或者是一个继承了 `ArrayIterator` 的集合。
* 第二个参数：可以是一个 `Transformer` 实例，也可以是一个包含格式的 `匿名函数`。

## Item 例子
```php
use App\Model\Book;
use League\Fractal;
use Fractal\Resource\Item;

$resource = new Item(Book::find($id), function(Book $book) {
    return [
        'id' => (int) $book->id,
        'title' => $book->title,
        'year' => (int) $book->yr,
        'links' => [ 'self' => '/books/'.$book->id ]
    ];
});
```

## Collection 例子
```php
use App\Model\Book;
use League\Fractal;
use Fractal\Resource\Collection;

$resource = new Item(Book::all(), function(Book $book) {
    return [
        'id' => (int) $book->id,
        'title' => $book->title,
        'year' => (int) $book->yr,
        'links' => [ 'self' => '/books/'.$book->id ]
    ];
});
```
