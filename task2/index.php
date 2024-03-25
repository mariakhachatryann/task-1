<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body {
        margin: 0;
        background: #a9a8a8;
        font-family: Arial, sans-serif;
    }

    .nav {
        display: flex;
        justify-content: space-between;
        width: 100%;
        background: #3d3939;
        align-items: center;
    }

    .title {
        padding: 0 10px;
        font-size: 20px;
        font-weight: bold;
        text-align: center;
        color: #ffffff;
    }
    
    .posts {
        padding: 10px;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        gap: 30px;
    }

    p.title1 {
        font-size: 25px;
        font-weight: 600;
        color: #000;
        text-align: center;
    }

    .post {
        padding: 10px;
        max-width: 700px;
        width: 100%;
        background: #858484;
        border-radius: 5px;
    }

    .post-title {
        font-size: 20px;
    }

    .btn {
        background: none;
        border: none;
        color: white;
        padding: 0 10px;
        font-size: 20px;
        cursor: pointer;
    }
</style>
<body>
    <div>
        <header class="nav">
            <p class="title">Dashboard</p>
            <form>
                <button class="btn">Log In</button>
            </form>
        </header>
        <p class="title1">POSTS</p>

        <div class="posts">
            <div class="post">
                <p class="post-title">post1</p>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quas cumque, enim nesciunt explicabo placeat, et voluptatem fuga tempora libero, vero dolore a distinctio ullam totam alias. Dolore unde consectetur dolorum laborum voluptatibus. Optio nisi error officiis obcaecati omnis. Commodi sapiente enim voluptas corrupti quae ducimus velit nulla, quos culpa exercitationem.
                </p>
            </div>

            <div class="post">
                <p class="post-title">post1</p>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quas cumque, enim nesciunt explicabo placeat, et voluptatem fuga tempora libero, vero dolore a distinctio ullam totam alias. Dolore unde consectetur dolorum laborum voluptatibus. Optio nisi error officiis obcaecati omnis. Commodi sapiente enim voluptas corrupti quae ducimus velit nulla, quos culpa exercitationem.</p>
            </div>
        </div>

    </div>
</body>
</html>