<!-- File: /app/View/Jobs/index.ctp -->

<div class="container">

<?php echo $this->Html->link(
    '<i class="fa fa-plus-circle mr-1" aria-hidden="true"></i>  Neuer Job anlegen',
    array('controller' => 'jobs', 'action' => 'add'),
	array('escape' => false, 'class' => 'btn btn-primary mb-2', 'style' => 'color: #fff;')
); ?>

<table class="table table-striped">
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Kontaktperson</th>
        <th>Erzeugt am</th>
        <th>Aktionen</th>
    </tr>

    <!-- Here is where we loop through our $jobs array, printing out job info -->
    <?php foreach ($jobs as $job): ?>
    <tr>
        <td><?php echo $job['Job']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($job['Job']['title'],
					array('controller' => 'jobs', 'action' => 'view', $job['Job']['id'])
					); ?>
        </td>
        <td><?php echo $job['Job']['contact_name']; ?></td>
        <td><?php echo $job['Job']['created']; ?></td>
		    <td>
            <?php
            echo $this->Html->link(
                '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>',
                array('action' => 'edit', $job['Job']['id']),
			          array('escape' => false,
                      'class' => 'btn btn-outline-dark  btn-sm mr-2 disabled')
				    );
									// Creates an HTML link, but access the URL using method POST.
            echo $this->Form->postLink(
                  '<i class="fa fa-trash" aria-hidden="true"></i>',
                  array('action' => 'delete', $job['Job']['id']),
					        array('escape' => false,
                        'class' => 'btn btn-outline-dark  btn-sm disabled',
                        'confirm' => 'Wollen Sie diesen Eintrag wirklich löschen?')
                );
            ?>
        </td>
    </tr>
    <?php endforeach; ?>
    <?php unset($job); ?>
</table>
</div>
