<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel基礎</title>
</head>

<body>
    <table>
        <tr>
            <th>ID</th>
            <td>{{ $posts->id }}</td> <!-- $postsに変更 -->
        </tr>
        <tr>
            <th>タイトル</th>
            <td>{{ $posts->title}}</td> <!-- $postsに変更 -->
        </tr>
        <tr>
            <th>コンテンツ</th>
            <td>{{ $posts->content }}</td> <!-- $postsに変更 -->
        </tr>    
        <tr>
            <th>作成日時</th>
            <td>{{ $posts->created_at }}</td> <!-- $postsに変更 -->            
        </tr>
        <tr>
            <th>更新日時</th>
            <td>{{ $posts->updated_at }}</td> <!-- $postsに変更 -->
        </tr>      
    </table>
</body>

</html>