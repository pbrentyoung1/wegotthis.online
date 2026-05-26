<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;

use App\Http\Controllers\AppsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChartsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ErrorController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\IconsController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LayoutsController;
use App\Http\Controllers\MapsController;
use App\Http\Controllers\MetricsController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PluginsController;
use App\Http\Controllers\TablesController;
use App\Http\Controllers\UiController;
use App\Http\Controllers\WidgetsController;

Route::redirect('/', '/dashboard/projects');

Route::prefix('apps')->group(function () {
    Route::get('/api-keys', [AppsController::class, 'apiKeys']);
    Route::get('/blog/add', [AppsController::class, 'blogAdd']);
    Route::get('/blog/article', [AppsController::class, 'blogArticle']);
    Route::get('/blog/grid', [AppsController::class, 'blogGrid']);
    Route::get('/blog/list', [AppsController::class, 'blogList']);
    Route::get('/calendar', [AppsController::class, 'calendar']);
    Route::get('/chat', [AppsController::class, 'chat']);
    Route::get('/clients', [AppsController::class, 'clients']);
    Route::get('/companies', [AppsController::class, 'companies']);
    Route::get('/ecommerce/attributes', [AppsController::class, 'ecommerceAttributes']);
    Route::get('/ecommerce/cart', [AppsController::class, 'ecommerceCart']);
    Route::get('/ecommerce/categories', [AppsController::class, 'ecommerceCategories']);
    Route::get('/ecommerce/checkout', [AppsController::class, 'ecommerceCheckout']);
    Route::get('/ecommerce/customers', [AppsController::class, 'ecommerceCustomers']);
    Route::get('/ecommerce/marketplace', [AppsController::class, 'ecommerceMarketplace']);
    Route::get('/ecommerce/order-add', [AppsController::class, 'ecommerceOrderAdd']);
    Route::get('/ecommerce/order-details', [AppsController::class, 'ecommerceOrderDetails']);
    Route::get('/ecommerce/orders', [AppsController::class, 'ecommerceOrders']);
    Route::get('/ecommerce/product-add', [AppsController::class, 'ecommerceProductAdd']);
    Route::get('/ecommerce/product-details', [AppsController::class, 'ecommerceProductDetails']);
    Route::get('/ecommerce/product-stocks', [AppsController::class, 'ecommerceProductStocks']);
    Route::get('/ecommerce/product-views', [AppsController::class, 'ecommerceProductViews']);
    Route::get('/ecommerce/products', [AppsController::class, 'ecommerceProducts']);
    Route::get('/ecommerce/products-grid', [AppsController::class, 'ecommerceProductsGrid']);
    Route::get('/ecommerce/purchased-orders', [AppsController::class, 'ecommercePurchasedOrders']);
    Route::get('/ecommerce/refunds', [AppsController::class, 'ecommerceRefunds']);
    Route::get('/ecommerce/reviews', [AppsController::class, 'ecommerceReviews']);
    Route::get('/ecommerce/sales', [AppsController::class, 'ecommerceSales']);
    Route::get('/ecommerce/seller-details', [AppsController::class, 'ecommerceSellerDetails']);
    Route::get('/ecommerce/sellers', [AppsController::class, 'ecommerceSellers']);
    Route::get('/ecommerce/settings', [AppsController::class, 'ecommerceSettings']);
    Route::get('/ecommerce/warehouse', [AppsController::class, 'ecommerceWarehouse']);
    Route::get('/email/compose', [AppsController::class, 'emailCompose']);
    Route::get('/email/details', [AppsController::class, 'emailDetails']);
    Route::get('/email/inbox', [AppsController::class, 'emailInbox']);
    Route::get('/file-manager', [AppsController::class, 'fileManager']);
    Route::get('/forum/post', [AppsController::class, 'forumPost']);
    Route::get('/forum/view', [AppsController::class, 'forumView']);
    Route::get('/invoice/create', [AppsController::class, 'invoiceCreate']);
    Route::get('/invoice/details', [AppsController::class, 'invoiceDetails']);
    Route::get('/invoice/list', [AppsController::class, 'invoiceList']);
    Route::get('/issue-tracker', [AppsController::class, 'issueTracker']);
    Route::get('/manage', [AppsController::class, 'manage']);
    Route::get('/outlook', [AppsController::class, 'outlook']);
    Route::get('/pin-board', [AppsController::class, 'pinBoard']);
    Route::get('/projects/activity', [AppsController::class, 'projectsActivity']);
    Route::get('/projects/details', [AppsController::class, 'projectsDetails']);
    Route::get('/projects/grid', [AppsController::class, 'projectsGrid']);
    Route::get('/projects/kanban', [AppsController::class, 'projectsKanban']);
    Route::get('/projects/list', [AppsController::class, 'projectsList']);
    Route::get('/projects/team-board', [AppsController::class, 'projectsTeamBoard']);
    Route::get('/social-feed', [AppsController::class, 'socialFeed']);
    Route::get('/users/contacts', [AppsController::class, 'usersContacts']);
    Route::get('/users/permissions', [AppsController::class, 'usersPermissions']);
    Route::get('/users/role-details', [AppsController::class, 'usersRoleDetails']);
    Route::get('/users/roles', [AppsController::class, 'usersRoles']);
    Route::get('/vote-list', [AppsController::class, 'voteList']);
});

Route::prefix('charts')->group(function () {
    Route::get('/apex/area', [ChartsController::class, 'apexArea']);
    Route::get('/apex/bar', [ChartsController::class, 'apexBar']);
    Route::get('/apex/boxplot', [ChartsController::class, 'apexBoxplot']);
    Route::get('/apex/bubble', [ChartsController::class, 'apexBubble']);
    Route::get('/apex/candlestick', [ChartsController::class, 'apexCandlestick']);
    Route::get('/apex/column', [ChartsController::class, 'apexColumn']);
    Route::get('/apex/funnel', [ChartsController::class, 'apexFunnel']);
    Route::get('/apex/heatmap', [ChartsController::class, 'apexHeatmap']);
    Route::get('/apex/line', [ChartsController::class, 'apexLine']);
    Route::get('/apex/mixed', [ChartsController::class, 'apexMixed']);
    Route::get('/apex/pie', [ChartsController::class, 'apexPie']);
    Route::get('/apex/polar-area', [ChartsController::class, 'apexPolarArea']);
    Route::get('/apex/radar', [ChartsController::class, 'apexRadar']);
    Route::get('/apex/radialbar', [ChartsController::class, 'apexRadialbar']);
    Route::get('/apex/range', [ChartsController::class, 'apexRange']);
    Route::get('/apex/scatter', [ChartsController::class, 'apexScatter']);
    Route::get('/apex/slope', [ChartsController::class, 'apexSlope']);
    Route::get('/apex/sparklines', [ChartsController::class, 'apexSparklines']);
    Route::get('/apex/timeline', [ChartsController::class, 'apexTimeline']);
    Route::get('/apex/treemap', [ChartsController::class, 'apexTreemap']);
    Route::get('/echart/area', [ChartsController::class, 'echartArea']);
    Route::get('/echart/bar', [ChartsController::class, 'echartBar']);
    Route::get('/echart/candlestick', [ChartsController::class, 'echartCandlestick']);
    Route::get('/echart/gauge', [ChartsController::class, 'echartGauge']);
    Route::get('/echart/geo-map', [ChartsController::class, 'echartGeoMap']);
    Route::get('/echart/heatmap', [ChartsController::class, 'echartHeatmap']);
    Route::get('/echart/line', [ChartsController::class, 'echartLine']);
    Route::get('/echart/other', [ChartsController::class, 'echartOther']);
    Route::get('/echart/pie', [ChartsController::class, 'echartPie']);
    Route::get('/echart/radar', [ChartsController::class, 'echartRadar']);
    Route::get('/echart/scatter', [ChartsController::class, 'echartScatter']);
});

Route::prefix('dashboard')->group(function () {
    Route::get('/analytics', [DashboardController::class, 'analytics']);
    Route::get('/ecommerce', [DashboardController::class, 'ecommerce']);
    Route::get('/projects', [DashboardController::class, 'projects']);
});

Route::prefix('form')->group(function () {
    Route::get('/elements', [FormController::class, 'elements']);
    Route::get('/fileuploads', [FormController::class, 'fileuploads']);
    Route::get('/layout', [FormController::class, 'layout']);
    Route::get('/other-plugin', [FormController::class, 'otherPlugin']);
    Route::get('/pickers', [FormController::class, 'pickers']);
    Route::get('/range-slider', [FormController::class, 'rangeSlider']);
    Route::get('/select', [FormController::class, 'select']);
    Route::get('/text-editors', [FormController::class, 'textEditors']);
    Route::get('/validation', [FormController::class, 'validation']);
    Route::get('/wizard', [FormController::class, 'wizard']);
});

Route::prefix('icons')->group(function () {
    Route::get('/flags', [IconsController::class, 'flags']);
    Route::get('/lucide', [IconsController::class, 'lucide']);
    Route::get('/tabler', [IconsController::class, 'tabler']);
});

Route::prefix('layouts')->group(function () {
    Route::get('/boxed', [LayoutsController::class, 'boxed']);
    Route::get('/compact', [LayoutsController::class, 'compact']);
    Route::get('/horizontal', [LayoutsController::class, 'horizontal']);
    Route::get('/preloader', [LayoutsController::class, 'preloader']);
    Route::get('/scrollable', [LayoutsController::class, 'scrollable']);
    Route::get('/sidebar-compact', [LayoutsController::class, 'sidebarCompact']);
    Route::get('/sidebar-gradient', [LayoutsController::class, 'sidebarGradient']);
    Route::get('/sidebar-gray', [LayoutsController::class, 'sidebarGray']);
    Route::get('/sidebar-image', [LayoutsController::class, 'sidebarImage']);
    Route::get('/sidebar-light', [LayoutsController::class, 'sidebarLight']);
    Route::get('/sidebar-no-icons', [LayoutsController::class, 'sidebarNoIcons']);
    Route::get('/sidebar-offcanvas', [LayoutsController::class, 'sidebarOffcanvas']);
    Route::get('/sidebar-on-hover', [LayoutsController::class, 'sidebarOnHover']);
    Route::get('/sidebar-on-hover-active', [LayoutsController::class, 'sidebarOnHoverActive']);
    Route::get('/sidebar-with-lines', [LayoutsController::class, 'sidebarWithLines']);
    Route::get('/topbar-dark', [LayoutsController::class, 'topbarDark']);
    Route::get('/topbar-gradient', [LayoutsController::class, 'topbarGradient']);
    Route::get('/topbar-gray', [LayoutsController::class, 'topbarGray']);
});

Route::prefix('maps')->group(function () {
    Route::get('/google', [MapsController::class, 'google']);
    Route::get('/leaflet', [MapsController::class, 'leaflet']);
    Route::get('/vector', [MapsController::class, 'vector']);
});

Route::prefix('metrics')->group(function () {
    Route::get('/', [MetricsController::class, 'index']);
});

Route::prefix('pages')->group(function () {
    Route::get('/account-settings', [PagesController::class, 'accountSettings']);
    Route::get('/coming-soon', [PagesController::class, 'comingSoon']);
    Route::get('/empty', [PagesController::class, 'empty']);
    Route::get('/faq', [PagesController::class, 'faq']);
    Route::get('/gallery', [PagesController::class, 'gallery']);
    Route::get('/pricing', [PagesController::class, 'pricing']);
    Route::get('/privacy-policy', [PagesController::class, 'privacyPolicy']);
    Route::get('/profile', [PagesController::class, 'profile']);
    Route::get('/search-results', [PagesController::class, 'searchResults']);
    Route::get('/sitemap', [PagesController::class, 'sitemap']);
    Route::get('/terms-conditions', [PagesController::class, 'termsConditions']);
    Route::get('/timeline', [PagesController::class, 'timeline']);
});

Route::prefix('plugins')->group(function () {
    Route::get('/animation', [PluginsController::class, 'animation']);
    Route::get('/clipboard', [PluginsController::class, 'clipboard']);
    Route::get('/idle-timer', [PluginsController::class, 'idleTimer']);
    Route::get('/loading-buttons', [PluginsController::class, 'loadingButtons']);
    Route::get('/masonry', [PluginsController::class, 'masonry']);
    Route::get('/pass-meter', [PluginsController::class, 'passMeter']);
    Route::get('/pdf-viewer', [PluginsController::class, 'pdfViewer']);
    Route::get('/sweet-alerts', [PluginsController::class, 'sweetAlerts']);
    Route::get('/text-diff', [PluginsController::class, 'textDiff']);
    Route::get('/tour', [PluginsController::class, 'tour']);
});

Route::prefix('tables')->group(function () {
    Route::get('/custom', [TablesController::class, 'custom']);
    Route::get('/datatables/ajax', [TablesController::class, 'datatablesAjax']);
    Route::get('/datatables/basic', [TablesController::class, 'datatablesBasic']);
    Route::get('/datatables/checkbox-select', [TablesController::class, 'datatablesCheckboxSelect']);
    Route::get('/datatables/column-searching', [TablesController::class, 'datatablesColumnSearching']);
    Route::get('/datatables/columns', [TablesController::class, 'datatablesColumns']);
    Route::get('/datatables/export-data', [TablesController::class, 'datatablesExportData']);
    Route::get('/datatables/fixed-columns', [TablesController::class, 'datatablesFixedColumns']);
    Route::get('/datatables/fixed-header', [TablesController::class, 'datatablesFixedHeader']);
    Route::get('/datatables/javascript', [TablesController::class, 'datatablesJavascript']);
    Route::get('/datatables/rendering', [TablesController::class, 'datatablesRendering']);
    Route::get('/datatables/rows-add', [TablesController::class, 'datatablesRowsAdd']);
    Route::get('/datatables/scroll', [TablesController::class, 'datatablesScroll']);
    Route::get('/datatables/select', [TablesController::class, 'datatablesSelect']);
    Route::get('/static', [TablesController::class, 'static']);
});

Route::prefix('ui')->group(function () {
    Route::get('/accordions', [UiController::class, 'accordions']);
    Route::get('/alerts', [UiController::class, 'alerts']);
    Route::get('/badges', [UiController::class, 'badges']);
    Route::get('/breadcrumb', [UiController::class, 'breadcrumb']);
    Route::get('/buttons', [UiController::class, 'buttons']);
    Route::get('/cards', [UiController::class, 'cards']);
    Route::get('/carousel', [UiController::class, 'carousel']);
    Route::get('/collapse', [UiController::class, 'collapse']);
    Route::get('/colors', [UiController::class, 'colors']);
    Route::get('/dropdowns', [UiController::class, 'dropdowns']);
    Route::get('/grid', [UiController::class, 'grid']);
    Route::get('/images', [UiController::class, 'images']);
    Route::get('/links', [UiController::class, 'links']);
    Route::get('/list-group', [UiController::class, 'listGroup']);
    Route::get('/modals', [UiController::class, 'modals']);
    Route::get('/notifications', [UiController::class, 'notifications']);
    Route::get('/offcanvas', [UiController::class, 'offcanvas']);
    Route::get('/pagination', [UiController::class, 'pagination']);
    Route::get('/placeholders', [UiController::class, 'placeholders']);
    Route::get('/popovers', [UiController::class, 'popovers']);
    Route::get('/progress', [UiController::class, 'progress']);
    Route::get('/spinners', [UiController::class, 'spinners']);
    Route::get('/tabs', [UiController::class, 'tabs']);
    Route::get('/tooltips', [UiController::class, 'tooltips']);
    Route::get('/typography', [UiController::class, 'typography']);
    Route::get('/utilities', [UiController::class, 'utilities']);
    Route::get('/videos', [UiController::class, 'videos']);
});

Route::prefix('widgets')->group(function () {
    Route::get('/', [WidgetsController::class, 'index']);
});

Route::prefix('auth')->group(function () {
    Route::get('/card/delete-account', [AuthController::class, 'cardDeleteAccount']);
    Route::get('/card/lock-screen', [AuthController::class, 'cardLockScreen']);
    Route::get('/card/login-pin', [AuthController::class, 'cardLoginPin']);
    Route::get('/card/new-pass', [AuthController::class, 'cardNewPass']);
    Route::get('/card/reset-pass', [AuthController::class, 'cardResetPass']);
    Route::get('/card/sign-in', [AuthController::class, 'cardSignIn']);
    Route::get('/card/sign-up', [AuthController::class, 'cardSignUp']);
    Route::get('/card/success-mail', [AuthController::class, 'cardSuccessMail']);
    Route::get('/card/two-factor', [AuthController::class, 'cardTwoFactor']);
    Route::get('/delete-account', [AuthController::class, 'deleteAccount']);
    Route::get('/lock-screen', [AuthController::class, 'lockScreen']);
    Route::get('/login-pin', [AuthController::class, 'loginPin']);
    Route::get('/new-pass', [AuthController::class, 'newPass']);
    Route::get('/reset-pass', [AuthController::class, 'resetPass']);
    Route::get('/sign-in', [AuthController::class, 'signIn']);
    Route::get('/sign-up', [AuthController::class, 'signUp']);
    Route::get('/split/delete-account', [AuthController::class, 'splitDeleteAccount']);
    Route::get('/split/lock-screen', [AuthController::class, 'splitLockScreen']);
    Route::get('/split/login-pin', [AuthController::class, 'splitLoginPin']);
    Route::get('/split/new-pass', [AuthController::class, 'splitNewPass']);
    Route::get('/split/reset-pass', [AuthController::class, 'splitResetPass']);
    Route::get('/split/sign-in', [AuthController::class, 'splitSignIn']);
    Route::get('/split/sign-up', [AuthController::class, 'splitSignUp']);
    Route::get('/split/success-mail', [AuthController::class, 'splitSuccessMail']);
    Route::get('/split/two-factor', [AuthController::class, 'splitTwoFactor']);
    Route::get('/success-mail', [AuthController::class, 'successMail']);
    Route::get('/two-factor', [AuthController::class, 'twoFactor']);
});

Route::prefix('error')->group(function () {
    Route::get('/400', [ErrorController::class, 'error400']);
    Route::get('/401', [ErrorController::class, 'error401']);
    Route::get('/403', [ErrorController::class, 'error403']);
    Route::get('/404', [ErrorController::class, 'error404']);
    Route::get('/408', [ErrorController::class, 'error408']);
    Route::get('/500', [ErrorController::class, 'error500']);
    Route::get('/maintenance', [ErrorController::class, 'maintenance']);
});

Route::prefix('landing')->group(function () {
    Route::get('/', [LandingController::class, 'index']);
});
