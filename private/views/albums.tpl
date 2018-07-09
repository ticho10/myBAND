<form action="index.php" method="get">
    <input type="hidden" name="page" value="news">
    <input type="text" name="searchterm" placeholder="Typ hier">
    <input type="submit" name="submit" value="Zoek">
</form>
<hr>
<div class="albums">
{foreach from=$album_info item=album}
    <section class="cover">
        <img src="{$album[3]}" alt="">
        <article>
            <h3>{$album[1]}</h3>
            <ul class="album">
                <li>
                    {$album[2]}
                </li>
            </ul>
        </article>
    </section>
{/foreach}
</div>