# Pagination
* Laravel’s `illuminate/pagination` package as `League\Fractal\Pagination\IlluminatePaginatorAdapter`。

```
use League\Fractal\Resource\Collection;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use Acme\Model\Book;
use Acme\Transformer\BookTransformer;

$paginator = Book::paginate();
$books = $paginator->getCollection();

$resource = new Collection($books, new BookTransformer);
$resource->setPaginator(new IlluminatePaginatorAdapter($paginator));
```
