<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/landing', function () {
    return view('landing');
});

Route::get('/auth/lock-screen', function () {
    return view('auth.lock-screen');
});

Route::get('/auth/sign-in', function () {
    return view('auth.sign-in');
});

Route::get('/auth/new-pass', function () {
    return view('auth.new-pass');
});

Route::get('/auth/delete-account', function () {
    return view('auth.delete-account');
});

Route::get('/auth/sign-up', function () {
    return view('auth.sign-up');
});

Route::get('/auth/reset-pass', function () {
    return view('auth.reset-pass');
});

Route::get('/auth/success-mail', function () {
    return view('auth.success-mail');
});

Route::get('/auth/two-factor', function () {
    return view('auth.two-factor');
});

Route::get('/auth/login-pin', function () {
    return view('auth.login-pin');
});

Route::get('/form/wizard', function () {
    return view('form.wizard');
});

Route::get('/form/fileuploads', function () {
    return view('form.fileuploads');
});

Route::get('/form/validation', function () {
    return view('form.validation');
});

Route::get('/form/elements', function () {
    return view('form.elements');
});

Route::get('/form/text-editors', function () {
    return view('form.text-editors');
});

Route::get('/form/layout', function () {
    return view('form.layout');
});

Route::get('/form/select', function () {
    return view('form.select');
});

Route::get('/form/other-plugin', function () {
    return view('form.other-plugin');
});

Route::get('/form/pickers', function () {
    return view('form.pickers');
});

Route::get('/form/range-slider', function () {
    return view('form.range-slider');
});

Route::get('/ui/tooltips', function () {
    return view('ui.tooltips');
});

Route::get('/ui/notifications', function () {
    return view('ui.notifications');
});

Route::get('/ui/typography', function () {
    return view('ui.typography');
});

Route::get('/ui/scrollspy', function () {
    return view('ui.scrollspy');
});

Route::get('/ui/offcanvas', function () {
    return view('ui.offcanvas');
});

Route::get('/ui/tabs', function () {
    return view('ui.tabs');
});

Route::get('/ui/breadcrumb', function () {
    return view('ui.breadcrumb');
});

Route::get('/ui/buttons', function () {
    return view('ui.buttons');
});

Route::get('/ui/placeholders', function () {
    return view('ui.placeholders');
});

Route::get('/ui/videos', function () {
    return view('ui.videos');
});

Route::get('/ui/collapse', function () {
    return view('ui.collapse');
});

Route::get('/ui/images', function () {
    return view('ui.images');
});

Route::get('/ui/dropdowns', function () {
    return view('ui.dropdowns');
});

Route::get('/ui/utilities', function () {
    return view('ui.utilities');
});

Route::get('/ui/carousel', function () {
    return view('ui.carousel');
});

Route::get('/ui/colors', function () {
    return view('ui.colors');
});

Route::get('/ui/cards', function () {
    return view('ui.cards');
});

Route::get('/ui/accordions', function () {
    return view('ui.accordions');
});

Route::get('/ui/alerts', function () {
    return view('ui.alerts');
});

Route::get('/ui/spinners', function () {
    return view('ui.spinners');
});

Route::get('/ui/pagination', function () {
    return view('ui.pagination');
});

Route::get('/ui/modals', function () {
    return view('ui.modals');
});

Route::get('/ui/popovers', function () {
    return view('ui.popovers');
});

Route::get('/ui/links', function () {
    return view('ui.links');
});

Route::get('/ui/progress', function () {
    return view('ui.progress');
});

Route::get('/ui/badges', function () {
    return view('ui.badges');
});

Route::get('/ui/list-group', function () {
    return view('ui.list-group');
});

Route::get('/apps/calendar', function () {
    return view('apps.calendar');
});

Route::get('/apps/outlook', function () {
    return view('apps.outlook');
});

Route::get('/apps/chat', function () {
    return view('apps.chat');
});

Route::get('/apps/clients', function () {
    return view('apps.clients');
});

Route::get('/apps/vote-list', function () {
    return view('apps.vote-list');
});

Route::get('/apps/api-keys', function () {
    return view('apps.api-keys');
});

Route::get('/apps/social-feed', function () {
    return view('apps.social-feed');
});

Route::get('/apps/companies', function () {
    return view('apps.companies');
});

Route::get('/apps/issue-tracker', function () {
    return view('apps.issue-tracker');
});

Route::get('/apps/file-manager', function () {
    return view('apps.file-manager');
});

Route::get('/apps/pin-board', function () {
    return view('apps.pin-board');
});

Route::get('/apps/manage', function () {
    return view('apps.manage');
});

Route::get('/dashboard/analytics', function () {
    return view('dashboard.analytics');
});

Route::get('/dashboard/ecommerce', function () {
    return view('dashboard.ecommerce');
});

Route::get('/tables/custom', function () {
    return view('tables.custom');
});

Route::get('/tables/static', function () {
    return view('tables.static');
});

Route::get('/layouts/compact', function () {
    return view('layouts.compact');
});

Route::get('/layouts/boxed', function () {
    return view('layouts.boxed');
});

Route::get('/layouts/horizontal', function () {
    return view('layouts.horizontal');
});

Route::get('/layouts/preloader', function () {
    return view('layouts.preloader');
});

Route::get('/layouts/scrollable', function () {
    return view('layouts.scrollable');
});

Route::get('/error/400', function () {
    return view('error.400');
});

Route::get('/error/500', function () {
    return view('error.500');
});

Route::get('/error/408', function () {
    return view('error.408');
});

Route::get('/error/404', function () {
    return view('error.404');
});

Route::get('/error/401', function () {
    return view('error.401');
});

Route::get('/error/maintenance', function () {
    return view('error.maintenance');
});

Route::get('/error/403', function () {
    return view('error.403');
});

Route::get('/icons/flags', function () {
    return view('icons.flags');
});

Route::get('/icons/tabler', function () {
    return view('icons.tabler');
});

Route::get('/icons/lucide', function () {
    return view('icons.lucide');
});

Route::get('/auth-split/lock-screen', function () {
    return view('auth-split.lock-screen');
});

Route::get('/auth-split/sign-in', function () {
    return view('auth-split.sign-in');
});

Route::get('/auth-split/new-pass', function () {
    return view('auth-split.new-pass');
});

Route::get('/auth-split/delete-account', function () {
    return view('auth-split.delete-account');
});

Route::get('/auth-split/sign-up', function () {
    return view('auth-split.sign-up');
});

Route::get('/auth-split/reset-pass', function () {
    return view('auth-split.reset-pass');
});

Route::get('/auth-split/success-mail', function () {
    return view('auth-split.success-mail');
});

Route::get('/auth-split/two-factor', function () {
    return view('auth-split.two-factor');
});

Route::get('/auth-split/login-pin', function () {
    return view('auth-split.login-pin');
});

Route::get('/pages/search-results', function () {
    return view('pages.search-results');
});

Route::get('/pages/coming-soon', function () {
    return view('pages.coming-soon');
});

Route::get('/pages/pricing', function () {
    return view('pages.pricing');
});

Route::get('/pages/faq', function () {
    return view('pages.faq');
});

Route::get('/pages/account-settings', function () {
    return view('pages.account-settings');
});

Route::get('/pages/gallery', function () {
    return view('pages.gallery');
});

Route::get('/pages/terms-conditions', function () {
    return view('pages.terms-conditions');
});

Route::get('/pages/profile', function () {
    return view('pages.profile');
});

Route::get('/pages/timeline', function () {
    return view('pages.timeline');
});

Route::get('/pages/empty', function () {
    return view('pages.empty');
});

Route::get('/pages/sitemap', function () {
    return view('pages.sitemap');
});

Route::get('/pages/privacy-policy', function () {
    return view('pages.privacy-policy');
});

Route::get('/auth-card/lock-screen', function () {
    return view('auth-card.lock-screen');
});

Route::get('/auth-card/sign-in', function () {
    return view('auth-card.sign-in');
});

Route::get('/auth-card/new-pass', function () {
    return view('auth-card.new-pass');
});

Route::get('/auth-card/delete-account', function () {
    return view('auth-card.delete-account');
});

Route::get('/auth-card/sign-up', function () {
    return view('auth-card.sign-up');
});

Route::get('/auth-card/reset-pass', function () {
    return view('auth-card.reset-pass');
});

Route::get('/auth-card/success-mail', function () {
    return view('auth-card.success-mail');
});

Route::get('/auth-card/two-factor', function () {
    return view('auth-card.two-factor');
});

Route::get('/auth-card/login-pin', function () {
    return view('auth-card.login-pin');
});

Route::get('/maps/leaflet', function () {
    return view('maps.leaflet');
});

Route::get('/maps/google', function () {
    return view('maps.google');
});

Route::get('/maps/vector', function () {
    return view('maps.vector');
});

Route::get('/plugins/sortable', function () {
    return view('plugins.sortable');
});

Route::get('/plugins/pdf-viewer', function () {
    return view('plugins.pdf-viewer');
});

Route::get('/plugins/tree-view', function () {
    return view('plugins.tree-view');
});

Route::get('/plugins/i18', function () {
    return view('plugins.i18');
});

Route::get('/plugins/tour', function () {
    return view('plugins.tour');
});

Route::get('/plugins/sweet-alerts', function () {
    return view('plugins.sweet-alerts');
});

Route::get('/plugins/loading-buttons', function () {
    return view('plugins.loading-buttons');
});

Route::get('/plugins/masonry', function () {
    return view('plugins.masonry');
});

Route::get('/plugins/pass-meter', function () {
    return view('plugins.pass-meter');
});

Route::get('/plugins/clipboard', function () {
    return view('plugins.clipboard');
});

Route::get('/plugins/idle-timer', function () {
    return view('plugins.idle-timer');
});

Route::get('/plugins/video-player', function () {
    return view('plugins.video-player');
});

Route::get('/plugins/text-diff', function () {
    return view('plugins.text-diff');
});

Route::get('/plugins/live-favicon', function () {
    return view('plugins.live-favicon');
});

Route::get('/plugins/animation', function () {
    return view('plugins.animation');
});

Route::get('/apps/email/compose', function () {
    return view('apps.email.compose');
});

Route::get('/apps/email/inbox', function () {
    return view('apps.email.inbox');
});

Route::get('/apps/email/details', function () {
    return view('apps.email.details');
});

Route::get('/apps/blog/add', function () {
    return view('apps.blog.add');
});

Route::get('/apps/blog/list', function () {
    return view('apps.blog.list');
});

Route::get('/apps/blog/grid', function () {
    return view('apps.blog.grid');
});

Route::get('/apps/blog/article', function () {
    return view('apps.blog.article');
});

Route::get('/apps/projects/list', function () {
    return view('apps.projects.list');
});

Route::get('/apps/projects/activity', function () {
    return view('apps.projects.activity');
});

Route::get('/apps/projects/grid', function () {
    return view('apps.projects.grid');
});

Route::get('/apps/projects/kanban', function () {
    return view('apps.projects.kanban');
});

Route::get('/apps/projects/team-board', function () {
    return view('apps.projects.team-board');
});

Route::get('/apps/projects/details', function () {
    return view('apps.projects.details');
});

Route::get('/apps/forum/view', function () {
    return view('apps.forum.view');
});

Route::get('/apps/forum/post', function () {
    return view('apps.forum.post');
});

Route::get('/apps/users/permissions', function () {
    return view('apps.users.permissions');
});

Route::get('/apps/users/roles', function () {
    return view('apps.users.roles');
});

Route::get('/apps/users/contacts', function () {
    return view('apps.users.contacts');
});

Route::get('/apps/users/role-details', function () {
    return view('apps.users.role-details');
});

Route::get('/apps/ecommerce/refunds', function () {
    return view('apps.ecommerce.refunds');
});

Route::get('/apps/ecommerce/product-views', function () {
    return view('apps.ecommerce.product-views');
});

Route::get('/apps/ecommerce/marketplace', function () {
    return view('apps.ecommerce.marketplace');
});

Route::get('/apps/ecommerce/categories', function () {
    return view('apps.ecommerce.categories');
});

Route::get('/apps/ecommerce/reviews', function () {
    return view('apps.ecommerce.reviews');
});

Route::get('/apps/ecommerce/checkout', function () {
    return view('apps.ecommerce.checkout');
});

Route::get('/apps/ecommerce/sellers', function () {
    return view('apps.ecommerce.sellers');
});

Route::get('/apps/ecommerce/orders', function () {
    return view('apps.ecommerce.orders');
});

Route::get('/apps/ecommerce/product-details', function () {
    return view('apps.ecommerce.product-details');
});

Route::get('/apps/ecommerce/sales', function () {
    return view('apps.ecommerce.sales');
});

Route::get('/apps/ecommerce/purchased-orders', function () {
    return view('apps.ecommerce.purchased-orders');
});

Route::get('/apps/ecommerce/settings', function () {
    return view('apps.ecommerce.settings');
});

Route::get('/apps/ecommerce/customers', function () {
    return view('apps.ecommerce.customers');
});

Route::get('/apps/ecommerce/attributes', function () {
    return view('apps.ecommerce.attributes');
});

Route::get('/apps/ecommerce/warehouse', function () {
    return view('apps.ecommerce.warehouse');
});

Route::get('/apps/ecommerce/product-stocks', function () {
    return view('apps.ecommerce.product-stocks');
});

Route::get('/apps/ecommerce/order-details', function () {
    return view('apps.ecommerce.order-details');
});

Route::get('/apps/ecommerce/seller-details', function () {
    return view('apps.ecommerce.seller-details');
});

Route::get('/apps/ecommerce/order-add', function () {
    return view('apps.ecommerce.order-add');
});

Route::get('/apps/ecommerce/products-grid', function () {
    return view('apps.ecommerce.products-grid');
});

Route::get('/apps/ecommerce/cart', function () {
    return view('apps.ecommerce.cart');
});

Route::get('/apps/ecommerce/product-add', function () {
    return view('apps.ecommerce.product-add');
});

Route::get('/apps/ecommerce/products', function () {
    return view('apps.ecommerce.products');
});

Route::get('/apps/invoice/list', function () {
    return view('apps.invoice.list');
});

Route::get('/apps/invoice/create', function () {
    return view('apps.invoice.create');
});

Route::get('/apps/invoice/details', function () {
    return view('apps.invoice.details');
});

Route::get('/tables/datatables/fixed-columns', function () {
    return view('tables.datatables.fixed-columns');
});

Route::get('/tables/datatables/ajax', function () {
    return view('tables.datatables.ajax');
});

Route::get('/tables/datatables/checkbox-select', function () {
    return view('tables.datatables.checkbox-select');
});

Route::get('/tables/datatables/columns', function () {
    return view('tables.datatables.columns');
});

Route::get('/tables/datatables/column-searching', function () {
    return view('tables.datatables.column-searching');
});

Route::get('/tables/datatables/basic', function () {
    return view('tables.datatables.basic');
});

Route::get('/tables/datatables/export-data', function () {
    return view('tables.datatables.export-data');
});

Route::get('/tables/datatables/rows-add', function () {
    return view('tables.datatables.rows-add');
});

Route::get('/tables/datatables/range-search', function () {
    return view('tables.datatables.range-search');
});

Route::get('/tables/datatables/child-rows', function () {
    return view('tables.datatables.child-rows');
});

Route::get('/tables/datatables/select', function () {
    return view('tables.datatables.select');
});

Route::get('/tables/datatables/javascript', function () {
    return view('tables.datatables.javascript');
});

Route::get('/tables/datatables/rendering', function () {
    return view('tables.datatables.rendering');
});

Route::get('/tables/datatables/fixed-header', function () {
    return view('tables.datatables.fixed-header');
});

Route::get('/tables/datatables/scroll', function () {
    return view('tables.datatables.scroll');
});

Route::get('/layouts/sidebar/offcanvas', function () {
    return view('layouts.sidebar.offcanvas');
});

Route::get('/layouts/sidebar/compact', function () {
    return view('layouts.sidebar.compact');
});

Route::get('/layouts/sidebar/image', function () {
    return view('layouts.sidebar.image');
});

Route::get('/layouts/sidebar/on-hover', function () {
    return view('layouts.sidebar.on-hover');
});

Route::get('/layouts/sidebar/gray', function () {
    return view('layouts.sidebar.gray');
});

Route::get('/layouts/sidebar/gradient', function () {
    return view('layouts.sidebar.gradient');
});

Route::get('/layouts/sidebar/on-hover-active', function () {
    return view('layouts.sidebar.on-hover-active');
});

Route::get('/layouts/sidebar/with-lines', function () {
    return view('layouts.sidebar.with-lines');
});

Route::get('/layouts/sidebar/light', function () {
    return view('layouts.sidebar.light');
});

Route::get('/layouts/topbar/dark', function () {
    return view('layouts.topbar.dark');
});

Route::get('/layouts/topbar/gray', function () {
    return view('layouts.topbar.gray');
});

Route::get('/layouts/topbar/gradient', function () {
    return view('layouts.topbar.gradient');
});

Route::get('/charts/echart/heatmap', function () {
    return view('charts.echart.heatmap');
});

Route::get('/charts/echart/bar', function () {
    return view('charts.echart.bar');
});

Route::get('/charts/echart/gauge', function () {
    return view('charts.echart.gauge');
});

Route::get('/charts/echart/geo-map', function () {
    return view('charts.echart.geo-map');
});

Route::get('/charts/echart/area', function () {
    return view('charts.echart.area');
});

Route::get('/charts/echart/other', function () {
    return view('charts.echart.other');
});

Route::get('/charts/echart/scatter', function () {
    return view('charts.echart.scatter');
});

Route::get('/charts/echart/candlestick', function () {
    return view('charts.echart.candlestick');
});

Route::get('/charts/echart/radar', function () {
    return view('charts.echart.radar');
});

Route::get('/charts/echart/line', function () {
    return view('charts.echart.line');
});

Route::get('/charts/echart/pie', function () {
    return view('charts.echart.pie');
});

Route::get('/charts/apex/heatmap', function () {
    return view('charts.apex.heatmap');
});

Route::get('/charts/apex/bar', function () {
    return view('charts.apex.bar');
});

Route::get('/charts/apex/boxplot', function () {
    return view('charts.apex.boxplot');
});

Route::get('/charts/apex/column', function () {
    return view('charts.apex.column');
});

Route::get('/charts/apex/sparklines', function () {
    return view('charts.apex.sparklines');
});

Route::get('/charts/apex/area', function () {
    return view('charts.apex.area');
});

Route::get('/charts/apex/radialbar', function () {
    return view('charts.apex.radialbar');
});

Route::get('/charts/apex/scatter', function () {
    return view('charts.apex.scatter');
});

Route::get('/charts/apex/funnel', function () {
    return view('charts.apex.funnel');
});

Route::get('/charts/apex/candlestick', function () {
    return view('charts.apex.candlestick');
});

Route::get('/charts/apex/slope', function () {
    return view('charts.apex.slope');
});

Route::get('/charts/apex/mixed', function () {
    return view('charts.apex.mixed');
});

Route::get('/charts/apex/bubble', function () {
    return view('charts.apex.bubble');
});

Route::get('/charts/apex/polar-area', function () {
    return view('charts.apex.polar-area');
});

Route::get('/charts/apex/radar', function () {
    return view('charts.apex.radar');
});

Route::get('/charts/apex/treemap', function () {
    return view('charts.apex.treemap');
});

Route::get('/charts/apex/line', function () {
    return view('charts.apex.line');
});

Route::get('/charts/apex/timeline', function () {
    return view('charts.apex.timeline');
});

Route::get('/charts/apex/pie', function () {
    return view('charts.apex.pie');
});

Route::get('/charts/apex/range', function () {
    return view('charts.apex.range');
});
