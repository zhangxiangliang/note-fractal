# Transformers

## Transformers

### 基础例子
```
namespace App\Transformers;

use App\Model\Book;
use League\Fractal\TransformerAbstract;

class BookTransformer extends TransformerAbstract
{
    public function transform(Book $book)
    {
        return [
            'id' => (int) $book->id,
            'title' => $book->title,
        ];
    }
}
```
使用
```
<?php
use App\Transformer\BookTransformer;
use League\Fractal\Resource\Item;
use League\Fractal\Resource\Collection;

$resource = new Item($book, new BookTransformer);
$resource = new Collection($books, new BookTransformer);
```

### 加载关系数据
```
class BookTransformer extends TransformerAbstract
{
    protected $availableIncludes = ['author'];
    public function transform(Book $book)
    {
        return [
            'id'    => (int) $book->id,
            'title' => $book->title,
            'year'    => (int) $book->yr,
        ];
    }
    public function includeAuthor(Book $book)
    {
        $author = $book->author;
        return $this->item($author, new AuthorTransformer);
    }
}
```

通过 HTTP GET 加载('/books?include=author,publisher')：
```
<?php
use League\Fractal\Manager;

$fractal = new Manager();

if (isset($_GET['include'])) {
    $fractal->parseIncludes($_GET['include']);
    // $fractal->parseExcludes('author');
}
```

传递参数 ('?include=comments:limit(5|1):order(created_at|desc)')
```
public function includeComments(Book $book, ParamBag $params = null)
{
    if ($params === null) return $book->comments;
}
```
