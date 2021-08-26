    <!-- Second navbar -->
    <div class="navbar navbar-default" id="navbar-second">

		<ul class="nav navbar-nav no-border visible-xs-block">
			<li><a class="text-center collapsed" data-toggle="collapse" data-target="#navbar-second-toggle"><i class="icon-menu7"></i></a></li>
		</ul>

		<div class="navbar-collapse collapse" id="navbar-second-toggle">
			<ul class="nav navbar-nav navbar-nav-material">

				<li <?= ($this->uri->segment(1) == 'dashboard') ? "class='active'": "";?>>
					<?= anchor('dashboard', '<i class="icon-display4 position-left"></i> Dashboard'); ?>
				</li>

				<!-- <li <?= ($this->uri->segment(1) == 'monitoring') ? "class='active'": "";?>>
					<?= anchor('monitoring', '<i class="icon-home position-left"></i> Shipment Monitoring '); ?>
				</li> -->

				<?php if($this->mylibrary->decrypted($this->session->userdata('Department_ID')) == LOGISTICS_DEPT_ID) : ?>
				<li <?= ($this->uri->segment(1) == 'schedule') ? "class='active'": "";?>>
					<?= anchor('schedule', '<i class="icon-calendar position-left"></i> Schedule'); ?>
				</li>
				<?php endif; ?>

				<li <?= ($this->uri->segment(1) == 'reports') ? "class='dropdown active'": "dropdown";?>>
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-chart position-left"></i> Reports <span class="caret"></span>
					</a>
					<ul class="dropdown-menu width-200">
					<?php if($this->mylibrary->decrypted($this->session->userdata('Department_ID')) == LOGISTICS_DEPT_ID || $this->mylibrary->decrypted($this->session->userdata('Department_ID')) == IT_DEPT_ID ) : ?>
						<li>
							<?= anchor('reports', '<i class="icon-statistics"></i> Daily Reports'); ?>
						</li>
					<?php endif; ?>
						<?php if($this->mylibrary->decrypted($this->session->userdata('Department_ID')) == LOGISTICS_DEPT_ID || $this->mylibrary->decrypted($this->session->userdata('Department_ID')) == IT_DEPT_ID || $this->mylibrary->decrypted($this->session->userdata('Emp_Id')) == IC_USER) : ?>
						<li>
							<?= anchor('reports/compliance', '<i class="icon-task"></i> Compliance Reports'); ?>
						</li>
						<li>
							<?= anchor('reports/logs', '<i class=" icon-stack"></i> Log Reports'); ?>
						</li>

						<?php endif; ?>

						<?php if($this->mylibrary->decrypted($this->session->userdata('Department_ID')) == STORE_OPS_DEPT_ID || (in_array($this->mylibrary->decrypted($this->session->userdata('PositionLevel_ID')), [0,1,2])) || $this->mylibrary->decrypted($this->session->userdata('Emp_Id')) == IC_USER || $this->mylibrary->decrypted($this->session->userdata('Department_ID')) == IT_DEPT_ID ) : ?>
							<li>
							<?= anchor('reports/daily', '<i class="icon-stats-bars3"></i> Daily Monitoring'); ?>
							</li>
						<?php endif; ?>
					</ul>
				</li>

				<!-- <li <?= ($this->uri->segment(1) == 'contact') ? "class='active'": "";?>>
					<?= anchor('contact', '<i class="icon-phone position-left"></i> Contact Us'); ?>
				</li> -->

				<?php
				if($this->mylibrary->decrypted($this->session->userdata('Department_ID')) == LOGISTICS_DEPT_ID && (in_array($this->mylibrary->decrypted($this->session->userdata('PositionLevel_ID')), CMS_USERS))) :
				?>
				<li <?= ($this->uri->segment(1) == 'maintenance') ? "class='dropdown active'": "dropdown";?>>
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-cog position-left"></i> Maintenance <span class="caret"></span>
					</a>
					<ul class="dropdown-menu width-200">
						<li>
							<?= anchor('maintenance/container', '<i class="icon-box"></i> Container'); ?>
						</li>
						<li>
							<?= anchor('maintenance/truck', '<i class="icon-truck"></i> Truck'); ?>
						</li>
						<li>
							<?= anchor('maintenance/drivers', '<i class="icon-users4"></i> Drivers'); ?>
						</li>
					</ul>
				</li>
				<?php
				endif;
				?>
				<?php
				if($this->mylibrary->decrypted($this->session->userdata('Emp_Id')) == MANUAL_USER ) :
				?>
                <li <?= ($this->uri->segment(1) == 'manual') ? "class='active'": "";?>>
					<?= anchor('manual', '<i class="icon-arrow-down16 position-left"></i> Manual Receiving'); ?>
				</li>
				<?php
				endif;
				?>
			</ul>
		</div>
	</div>
	<!-- /second navbar -->
