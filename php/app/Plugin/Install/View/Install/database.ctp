<div class="install form">
	<h2><?php echo $title_for_layout; ?></h2>
	<?php
		echo $this->Form->create(null, array('url' => array('plugin' => 'install', 'controller' => 'install', 'action' => 'database')));
		echo $this->Form->input('Install.datasource', array(
			'label' => 'Datasource',
			'default' => 'Database/Mysql',
			'empty' => false,
			'options' => array(
				'Database/Mysql' => 'mysql',
				'Database/Sqlite' => 'sqlite',
				'Database/Postgres' => 'postgres',
				'Database/Sqlserver' => 'mssql',
			),
		));
		echo $this->Form->input('Install.host', array('label' => 'Host', 'default' => $_ENV['OPENSHIFT_DB_HOST']));
		echo $this->Form->input('Install.login', array('label' => 'User / Login', 'default' => $_ENV['OPENSHIFT_DB_USERNAME']));
		echo $this->Form->input('Install.password', array('label' => 'Password'));
		echo $this->Form->input('Install.database', array('label' => 'Name', 'default' => $_ENV['OPENSHIFT_APP_NAME']));
		echo $this->Form->input('Install.prefix', array('label' => 'Prefix'));
		echo $this->Form->input('Install.port', array('label' => 'Port', 'default' => $_ENV['OPENSHIFT_DB_PORT']));
		echo $this->Form->end('Submit');
	?>
</div>
