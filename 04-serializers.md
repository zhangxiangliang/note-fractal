# Serializers
* 序列化 `Serializer` 构造器，用来将 `Resource` 对象的数据信息转化成需要的 `传输类型`(`Array`, `Json`, `xml`) 和相应的 `传输格式` ( `JSON-API`, `HAL` )。
* 很多序列化的 传输格式 主要区别在于 `数据` 存放在那个 `命名空间`。
* `Serializer` 类可以让你在不改变 `Transformers` 的情况下，格式化输出各种各样的数据格式。

## 例子
```
use App\Model\Book;
use App\Transformer\BookTransformer;
use League\Fractal\Manage;
use League\Fractal\Resource\Item;
use League\Fractal\Serializer\DataArraySerializer;

$manager = new Manager();
$manager->setSerializer(new DataArraySerializer());

$resource = new Item(Book::find(1), new BookTransFormer());
$manager->createData($resource)->toArray();
```

## 自定义序列化器
* 需要继承 `SerializerAbstract`。

## 自带的序列化器
### DataArraySerializer
```
[
    'data'=> [
        'name' => []
        'comments' => [ 'data' => [], 'meta' => []]
    ],
    'meta' => []
]
```

### ArraySerializer
```
// Item
[ 'name' => 'bar', meta => []]
// Collection
[ ['name' => 'bar'], ['name' => 'baz'], meta => [] ]
```

### JsonAPISerializer
