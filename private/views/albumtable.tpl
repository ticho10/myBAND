<h3>TABLE</h3>
<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Songs</th>
        <th>Image links</th>
        <th></th>
    </tr>
{foreach from=$album_info item=album}
    <tr>
        <td>{$album[0]}</td>
        <td>{$album[1]}</td>
        <td>{$album[2]}</td>
        <td>{$album[3]}</td>
        <th><a href="index.php?page=admin&id={$album[0]}"><b>DELETE</b></a></th>
    </tr>
{/foreach}
</table>