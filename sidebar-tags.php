			<?php if ($tags = get_tags()) : ?>
				
				<?php if (is_page('blog-listing')) : ?>
					<?php $pageurl = get_permalink( get_page_by_path( 'blog-listing' ) ); ?>
				<?php elseif (is_category()) : ?>
					<?php 
						global $wp;
						$new_url = preg_replace('/page\/\d+/', '', $wp->request);
						$pageurl = home_url( add_query_arg( array(), $new_url ) );
					 ?>
				<?php else : ?>
					<?php $pageurl = get_permalink( get_page_by_path( 'blog-listing' ) ); ?>
				<?php endif; ?>

				<div class="post_tags">
					<h2 class="sidebar-title">Tags</h2>
					<?php foreach ( $tags as $tag ) : ?>
						<?php if (isset($_GET['tagged'])) : ?>
							<?php $tag_array = explode(",",$_GET['tagged']); ?>
							<?php $qs = $pageurl . "?tagged="; ?>
							<?php $active = false; ?>
				    		<?php foreach ($tag_array as $key => $t) : ?>
				    			<?php if ($t != $tag->slug) {
				    				$qs .= $t . ',';
				    			} else {
				    				$active = true;
				    			}
				    			?>
				    		<?php endforeach; ?>
				    		<?php if (!$active) $qs .= $tag->slug; ?>
							<a href="<?php echo $qs; ?>" title="<?php echo $tag->name ?>" class="<?php echo $active ? 'selected' : ''; ?>">
								<?php echo $tag->name; ?>
							</a>
						<?php else : ?>
					    	<a href="<?php echo $pageurl . '?tagged=' . $tag->slug; ?>" title="<?php echo $tag->name ?>" class="<?php echo $tag->slug ?>">
					    		<?php echo $tag->name; ?>
					    	</a>
						<?php endif; ?>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>