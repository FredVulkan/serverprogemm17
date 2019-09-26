<nav>
    <ul>
        <?php if(uri() != ""): ?>
            <li><a href="/">home</a></li>
        <?php endif; ?>
        <?php if(uri() != "page1"): ?>
            <li><a href="/page1">page 1</a></li>
        <?php endif; ?>
        <?php if(uri() != "page2"): ?>
            <li><a href="/page2">page 2</a></li>
        <?php endif; ?>
        <?php if(uri() != "employees"): ?>
            <li><a href="/employees">employees</a></li>
        <?php endif; ?>
    </ul>
</nav>