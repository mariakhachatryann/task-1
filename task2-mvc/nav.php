<nav class="nav">
    <?php if(isset($_SESSION['admin'])): ?>
        <a class="link" href="index.php?action="><?= $_SESSION['admin']['username'] ?>'s  Dashboard</a>
        <div>
            <a class="link" href="index.php?action=all_posts">All posts</a>
            <a class="link" href="index.php?action=my_posts">My posts</a>
        </div>
        <div>
            <a class="link" href="index.php?action=logout">Log Out</a>
            <a class="link" href="index.php?action=create">Create post</a>
        </div>
    <?php else: ?>
        <a class="link" href="index.php?action=">Dashboard</a>
        <a class="link" href="index.php?action=loginPage">Log In</a>
    <?php endif; ?>
</nav>

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


    .link {
        margin-top: 0;
        color: white;
        padding: 15px;
        font-size: 17px;
        cursor: pointer;
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
        font-size: 25px;
        font-weight: 600;
        margin-top: 12px;
    }

    .post-details {
        width: 100%;
        margin: 20px 0;
        display: flex;
        justify-content: space-between;
    }


    #box {
        width: 100%;
        display: flex;
        margin-top: 30px;
        align-items: center;
        flex-direction: column;
    }

    form {
        background-color: #ffffff;
        border: 1px solid #d1d5db;
        padding: 2rem;
        width: 400px;
        border-radius: 0.75rem;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    form p {
        font-weight: bold;
        font-size: 1.875rem;
        margin-bottom: 1rem;
        margin-top: 0;
    }

    input[type="text"],
    input[type="password"],
    textarea{
        width: 100%;
        margin: 0.5rem 0;
        border: 1px solid #d1d5db;
        border-radius: 0.5rem;
        padding: 0.75rem 1rem;
        background-color: #f3f4f6;
        outline: none;
        transition: border-color 0.3s ease;
    }

    input[type="text"]:focus,
    input[type="password"]:focus{
        border-color: #3b82f6;
    }

    input[type="submit"] {
        padding: 0.75rem 2.5rem;
        margin-top: 1rem;
        background-color: #3b82f6;
        color: #ffffff;
        border: none;
        border-radius: 0.5rem;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    input[type="submit"]:hover {
        background-color: #2563eb;
    }

    .error-message {
        color: #ef4444;
        font-weight: bold;
        margin-top: 0.75rem;
    }

    a {
        margin-top: 1rem;
        color: #3b82f6;
        font-weight: bold;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    a:hover {
        color: #2563eb;
    }

    .welcome {
        font-size: 25px;
        color: black;
    }

    .edit-btn {
        margin: 20px;
        cursor: pointer;
        color: #1b9441;
        background: #ccc;
        padding: 2px;
    }

    .delete-btn {
        margin: 20px;
        cursor: pointer;
        background: #ccc;
        padding: 2px;
        color: #e73838;
    }

    .delete-btn:hover {
        color: red;
    }

    .see-btn {
        margin: 20px;
        cursor: pointer;
        background: #ccc;
        padding: 2px;
        color: #35689f;
    }

    .see-btn:hover {
        color: #1a4e83;
    }

    .post-view {
        padding: 30px;
    }

    .post-view .title {
        font-size: 30px;
        font-weight: bold;
    }

    .post-view .text {
        line-height: 25px;
    }

    .details {
        display: flex;
        gap: 20px;
    }
</style>