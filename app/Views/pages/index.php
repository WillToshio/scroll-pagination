<div class="p-5"></div>
<div class="container tabela-scrollabe">
    <table class="table table-striped text-center" id="tabelaTeste">
        <thead class="table-dark sticky-top">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Text</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($articles as $row) :?> 
                <tr>
                    <td scope="row"><?= lang($row['id']); ?></td>
                    <td><?= lang($row['title']); ?></td>
                    <td><?= (strlen($row['text']) > 30) ? substr($row['text'],0,30)."..." : $row['text']; ?></td>
                </tr>
            <?php endforeach; ?>
            
        </tbody>
    </table>
</div>