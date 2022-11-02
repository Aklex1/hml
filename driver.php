<?php
/*
 * Template name: Авто с водителем
 */
	get_header();
?>
<!-- единичное фото в шапке с текстом -->
<div class="bg-100 bg-driver">
	<div class="container-wide">
		<div class="slider-driver">
			<div class="driver-01">
				<div class="container container-driver-s-klass">
					<div class="s-klass__description introtext">Роскошный <strong>S-КЛАСС</strong> с&nbsp;водителем для <strong>особых случаев</strong></div>
					<div class="s-klass-more">
						<a href="/mercedes/">Узнать больше</a>
						<a href="#driver-park" class="driver" title="Посмотреть парк авто с водителем">Посмотреть парк авто с водителем</a>
					</div>
				</div>
			</div>
			<div class="driver-02">
				<div class="container">
					<div class="s-klass__description introtext"><strong>Превосходные</strong> автомобили</div>
				</div>
			</div>
			<div class="driver-03">
				<div class="container">
					<div class="s-klass__description introtext"><strong>Высокопрофессиональные</strong> водители</div>
				</div>
			</div>
			<div class="driver-04">
				<div class="container">
					<div class="s-klass__description introtext">Подача <strong>по требованию</strong> или&nbsp;заранее</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /единичное фото в шапке с текстом -->
<!-- контент страницы -->
<div class="bg-100 post_container">
	<div class="container">
		<?php if (have_posts()) : ?>
  		<?php while (have_posts()) : the_post(); ?>
		<div class="post">
			<div class="post__header container-slider__header">
				<h3><?php the_title();?></h3>
			</div>
			<div class="post__catalogue" id="driver-park" name="driver-park">
				<div class="post__content">
					<?php the_content();?>
				</div>
			</div>
		</div>
		<?php endwhile; ?>
		<?php else : ?>		
		<div class="post">
			<div class="post__header container-slider__header">
		  <h3>Ничего не найдено</h3>
			</div>
			<div class="post__content post__content_single">
				<p>По заданным критериям поиска ничего не найдено. Либо страница или раздел незаполнен или отсутствует на сайте.</p>
			</div>
		</div>
		<?php endif;?>	

		<div class="post">
			<div class="post__catalogue" id="driver-park" name="driver-park">
				<div class="post__catalogue__carlist">
				<?php
				$args = array(
					'post_type' => 'auto_car',
					'posts_per_page' => -1,
					
				);
				$query = new WP_Query($args);
				// дурной счётчик для id автомобиля и открываемого окна, которое будет относиться только к нему
				$i = 0;
				while ($query->have_posts()) {
					$query->the_post(); ?>
					<div class="driver-car" id="car<?=$i;?>">
						
						
						<div class="photo">
							<a href="<?php the_permalink();?>"><?=get_the_post_thumbnail(get_the_ID());?></a>
						</div>
						<div class="car_description">
							<div class="car_description__name"><?php the_title();?>, <span class="year"><?=get_field('car_year');?></span></div>
							<div class="car_description__price"><span><?=get_field('car_price');?></span> р.</div>
						</div>
					</div>
				<?php 
					$i++;
				} ?>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /контент страницы -->
<?php get_footer();?>