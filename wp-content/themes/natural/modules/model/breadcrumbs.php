<?php
/**
 * Хлебные крошки для WordPress (breadcrumbs)
 *
 * $sep  - разделитель. По умолчанию ' » '
 * $l10n - массив. для локализации. См. переменную $default_l10n.
 * $args - массив. дополнительные аргументы.
 * version 0.8
*/
function kama_breadcrumbs( $sep = '', $l10n = array(), $args = array() ){
	global $post, $wp_query, $wp_post_types;

	// Локализация
	$default_l10n = array(
		'home'       => 'Natural Pharmaceuticals',
		'paged'      => 'Strona %s',
		'_404'       => 'Błąd 404',
		'search'     => 'Wyniki wyszukiwania dla - <b>%s</b>',
		'author'     => 'Archiwa autorem: <b>%s</b>',
		'year'       => 'Archiwum <b>%s</b> год',
		'month'      => 'Archiwum: <b>%s</b>',
		'day'        => '',
		'attachment' => 'Mediów: %s',
		'tag'        => 'Tagi: <b>%s</b>',
		'tax_tag'    => '%s из "%s" по тегу: <b>%s</b>',
	);

	// Параметры по умолчанию
	$default_args = array(
		'on_front_page'   => true,  // выводить крошки на главной странице
		'show_post_title' => true,  // показывать ли название записи в конце (последний элемент). Для записей, страниц, вложений
		'sep'             => ' » ', // разделитель
		'markup'          => 'schema.org', // микроразметка. Может быть: rdf.data-vocabulary.org или schema.org
		'priority_tax'    => array('category'), // приоритетные таксономии, если запись в нескольких таксах
	);

	// Фильтрует аргументы по умолчанию.
	$default_args = apply_filters('kama_breadcrumbs_default_args', $default_args );

	$loc  = (object) array_merge( $default_l10n, $l10n );
	$args = (object) array_merge( $default_args, $args );

	if( ! $sep ) $sep = $args->sep;

	// микроразметка ---
	// rdf.data-vocabulary.org
	if( $args->markup == 'rdf.data-vocabulary.org' ){
		$w1 = '<div class="kama_breadcrumbs" prefix="v: http://rdf.data-vocabulary.org/#">';
		$w2 = '</div>';
		$patt1 = '<span typeof="v:Breadcrumb"><a href="%s" rel="v:url" property="v:title">';
		$sep .= '</span>'; // закрываем span после разделителя!
		$linkpatt = $patt1.'%s</a>';
	}
	// schema.org
	elseif( $args->markup == 'schema.org' ){
		$w1 = '<div class="kama_breadcrumbs" vocab="http://schema.org/" typeof="BreadcrumbList">';
		$w2 = '</div>';
		$patt1 = '<span property="itemListElement" typeof="ListItem"><a href="%s" property="item" typeof="WebPage"><span property="name">';
		$sep .= '</span>'; // закрываем span после разделителя!
		$linkpatt = $patt1.'%s</span></a>';
	}

	$ptype = & $wp_post_types[ $post->post_type ];

	// Вывод
	$pg_end = '';
	if( $paged = $wp_query->query_vars['paged'] ){
		$pg_patt = $patt1;
		$pg_end  = '</a>'. $sep . sprintf( $loc->paged, $paged );
	}

	$out = '';
	if( is_front_page() ){
		return $args->on_front_page ? ( print $w1 .( $paged ? sprintf( $pg_patt, get_bloginfo('url') ) : '' ) . $loc->home . $pg_end . $w2 ) : '';

	}
	elseif( is_404() ){
		$out = $loc->_404;
	}
	elseif( is_search() ){
		$out = sprintf( $loc->search, strip_tags( $GLOBALS['s'] ) );
	}
	elseif( is_author() ){
		$q_obj = &$wp_query->queried_object;
		$out = ( $paged ? sprintf( $pg_patt, get_author_posts_url( $q_obj->ID, $q_obj->user_nicename ) ):'') . sprintf( $loc->author, $q_obj->display_name ) . $pg_end;
	}
	elseif( is_year() || is_month() || is_day() ){
		$y_url  = get_year_link( $year=get_the_time('Y') );
		$m_url  = get_month_link( $year, get_the_time('m') );
		$y_link = sprintf( $linkpatt, $y_url, $year);
		$m_link = sprintf( $linkpatt, $m_url, get_the_time('F'));
		if( is_year() )
			$out = ( $paged?sprintf( $pg_patt, $y_url):'') . sprintf( $loc->year, $year ) . $pg_end;
		elseif( is_month() )
			$out = $y_link . $sep . ( $paged ? sprintf( $pg_patt, $m_url ) : '') . sprintf( $loc->month, get_the_time('F') ) . $pg_end;
		elseif( is_day() )
			$out = $y_link . $sep . $m_link . $sep . get_the_time('l');
	}

	// Древовидные записи
	elseif( is_singular() && $ptype->hierarchical ){
		$parent = $post->post_parent;
		$crumbs = array();
		while( $parent ){
			$page = & get_post( $parent );
			$crumbs[] = sprintf( $linkpatt, get_permalink( $page->ID ), $page->post_title );
			$parent = $page->post_parent;
		}
		$crumbs = array_reverse( $crumbs );

		foreach( $crumbs as $crumb ) $out .= $crumb . $sep;

		$out = $out . ( $args->show_post_title ? $post->post_title : '');
	}
	// Таксономии, вложения и не древовидные типы записей
	else {
		// Определяем термины
		if( is_singular() ){
			$taxonomies   = get_object_taxonomies( $post->post_type );
			// оставим только древовидные и публичные, мало ли...
			$taxonomies   = array_intersect( $taxonomies, get_taxonomies( array('hierarchical' => true, 'public' => true) ) );
			$priority_tax = array_intersect( $taxonomies, $args->priority_tax ); // пробуем найти приоритетные
			// получаем название вожделенной таксы
			$taxonomy = $priority_tax ? array_shift( $priority_tax ) : array_shift( $taxonomies );

			$pid = ($post->post_parent ? $post->post_parent : $post->ID); // для вложений

			if( $term = get_the_terms( $pid, $taxonomy ) )
				$term = array_shift( $term );
		}
		else
			$term = $wp_query->get_queried_object();

		//if( ! $term && ! is_attachment() ) return print "Error: Taxonomy is not defined!";

		if( $term ){
			$term = apply_filters('kama_breadcrumbs_term', $term );

			$pg_term_start = ( $paged && $term->term_id ) ? sprintf( $pg_patt, get_term_link( (int) $term->term_id, $term->taxonomy ) ) : '';

			// attachment
			if( is_attachment() ){
				if( ! $post->post_parent )
					$out = sprintf( $loc->attachment, $post->post_title );
				else
					$out = __crumbs_tax( $term->term_id, $term->taxonomy, $sep, $linkpatt ) . sprintf( $linkpatt, get_permalink( $post->post_parent ), get_the_title( $post->post_parent ) ) . $sep . ( $args->show_post_title ? $post->post_title : '');
			}
			// single
			elseif( is_single() ){
				$out = __crumbs_tax( $term->parent, $term->taxonomy, $sep, $linkpatt ) . sprintf( $linkpatt, get_term_link( (int) $term->term_id, $term->taxonomy ), $term->name ). $sep . ( $args->show_post_title ? $post->post_title : '');
			// Метки, архивная страница типа записи, произвольные одноуровневые таксономии
			}
			// taxonomy не древовидная
			elseif( ! is_taxonomy_hierarchical( $term->taxonomy ) ){
				// метка
				if( is_tag() )
					$out = $pg_term_start . sprintf( $loc->tag, $term->name ) . $pg_end;
				// таксономия
				elseif( is_tax() ){
					$post_label = $ptype->labels->name;
					$tax_label = $GLOBALS['wp_taxonomies'][ $term->taxonomy ]->labels->name;
					$out = $pg_term_start . sprintf( $loc->tax_tag, $post_label, $tax_label, $term->name ) .  $pg_end;
				}
			}
			// Рубрики и таксономии
			else{
				//die( $term->taxonomy );
				$out = __crumbs_tax( $term->parent, $term->taxonomy, $sep, $linkpatt ) . $pg_term_start . $term->name . $pg_end;
			}
		}
	}

	$home_after = '';

	// замена ссылки на архивную страницу для типа записи
	$home_after = apply_filters('kama_breadcrumbs_home_after', false, $linkpatt, $sep );


	// Cсылка на архивную страницу произвольно типа поста. Ссылку можно заменить с помощью хука 'kama_breadcrumbs_home_after'
	if( ! $home_after && $ptype->has_archive && (is_post_type_archive() || is_singular()) && ! in_array( $post->post_type, array('post','page','attachment') ) ){
		$pt_name = $ptype->labels->name;

		if( is_post_type_archive() && ! $paged )
			$home_after = $pt_name;
		else
			$home_after = sprintf( $linkpatt, get_post_type_archive_link( $post->post_type ), $pt_name ) . ($pg_end ? $pg_end : $sep);
	}

	$home = sprintf( $linkpatt, home_url(), $loc->home ). $sep . $home_after;

	$out = apply_filters('kama_breadcrumbs_pre_out', $out );

	$out = $w1. $home . $out .$w2;

	return print apply_filters('kama_breadcrumbs', $out, $sep );
}
function __crumbs_tax( $term_id, $tax, $sep, $linkpatt ){
	$termlink = array();
	while( (int) $term_id ){
		$term2      = get_term( $term_id, $tax );
		$termlink[] = sprintf( $linkpatt, get_term_link( (int) $term2->term_id, $term2->taxonomy ), $term2->name ). $sep;
		$term_id    = (int) $term2->parent;
	}

	$termlinks = array_reverse( $termlink );

	return implode('', $termlinks );
}
