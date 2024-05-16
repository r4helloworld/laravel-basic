<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel基礎</title>
</head>

<body>
    <h1>お問い合わせ</h1>
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <table>
            <tr>
                <th>タイトル</th>
                <td>
                    <input type="text" name="title">
                </td>
            </tr>
            <tr>
                <th>コンテンツ</th>
                <td>
                    <input type="text" name="content">
                </td>
            </tr>
        </table>
        @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <input type="submit" value="送信">
    </form>
</body>

</html>
