<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class AppsController extends Controller
{

    public function apiKeys()
    {
        return Inertia::render('admin/apps/api-keys/index');
    }

    public function blogAdd()
    {
        return Inertia::render('admin/apps/blog/add/index');
    }

    public function blogArticle()
    {
        return Inertia::render('admin/apps/blog/article/index');
    }

    public function blogGrid()
    {
        return Inertia::render('admin/apps/blog/grid/index');
    }

    public function blogList()
    {
        return Inertia::render('admin/apps/blog/list/index');
    }

    public function calendar()
    {
        return Inertia::render('admin/apps/calendar/index');
    }

    public function chat()
    {
        return Inertia::render('admin/apps/chat/index');
    }

    public function clients()
    {
        return Inertia::render('admin/apps/clients/index');
    }

    public function companies()
    {
        return Inertia::render('admin/apps/companies/index');
    }

    public function ecommerceAttributes()
    {
        return Inertia::render('admin/apps/ecommerce/attributes/index');
    }

    public function ecommerceCart()
    {
        return Inertia::render('admin/apps/ecommerce/cart/index');
    }

    public function ecommerceCategories()
    {
        return Inertia::render('admin/apps/ecommerce/categories/index');
    }

    public function ecommerceCheckout()
    {
        return Inertia::render('admin/apps/ecommerce/checkout/index');
    }

    public function ecommerceCustomers()
    {
        return Inertia::render('admin/apps/ecommerce/customers/index');
    }

    public function ecommerceMarketplace()
    {
        return Inertia::render('admin/apps/ecommerce/marketplace/index');
    }

    public function ecommerceOrderAdd()
    {
        return Inertia::render('admin/apps/ecommerce/orders/order-add/index');
    }

    public function ecommerceOrderDetails()
    {
        return Inertia::render('admin/apps/ecommerce/orders/order-details/index');
    }

    public function ecommerceOrders()
    {
        return Inertia::render('admin/apps/ecommerce/orders/orders/index');
    }

    public function ecommerceProductAdd()
    {
        return Inertia::render('admin/apps/ecommerce/products/product-add/index');
    }

    public function ecommerceProductDetails()
    {
        return Inertia::render('admin/apps/ecommerce/products/product-details/index');
    }

    public function ecommerceProductStocks()
    {
        return Inertia::render('admin/apps/ecommerce/inventory/product-stocks/index');
    }

    public function ecommerceProductViews()
    {
        return Inertia::render('admin/apps/ecommerce/reports/product-views/index');
    }

    public function ecommerceProducts()
    {
        return Inertia::render('admin/apps/ecommerce/products/products/index');
    }

    public function ecommerceProductsGrid()
    {
        return Inertia::render('admin/apps/ecommerce/products/products-grid/index');
    }

    public function ecommercePurchasedOrders()
    {
        return Inertia::render('admin/apps/ecommerce/inventory/purchased-orders/index');
    }

    public function ecommerceRefunds()
    {
        return Inertia::render('admin/apps/ecommerce/refunds/index');
    }

    public function ecommerceReviews()
    {
        return Inertia::render('admin/apps/ecommerce/reviews/index');
    }

    public function ecommerceSales()
    {
        return Inertia::render('admin/apps/ecommerce/reports/sales/index');
    }

    public function ecommerceSellerDetails()
    {
        return Inertia::render('admin/apps/ecommerce/sellers/seller-details/index');
    }

    public function ecommerceSellers()
    {
        return Inertia::render('admin/apps/ecommerce/sellers/sellers/index');
    }

    public function ecommerceSettings()
    {
        return Inertia::render('admin/apps/ecommerce/settings/index');
    }

    public function ecommerceWarehouse()
    {
        return Inertia::render('admin/apps/ecommerce/inventory/warehouse/index');
    }

    public function emailCompose()
    {
        return Inertia::render('admin/apps/email/compose/index');
    }

    public function emailDetails()
    {
        return Inertia::render('admin/apps/email/details/index');
    }

    public function emailInbox()
    {
        return Inertia::render('admin/apps/email/inbox/index');
    }

    public function fileManager()
    {
        return Inertia::render('admin/apps/file-manager/index');
    }

    public function forumPost()
    {
        return Inertia::render('admin/apps/forum/post/index');
    }

    public function forumView()
    {
        return Inertia::render('admin/apps/forum/view/index');
    }

    public function invoiceCreate()
    {
        return Inertia::render('admin/apps/invoice/create/index');
    }

    public function invoiceDetails()
    {
        return Inertia::render('admin/apps/invoice/details/index');
    }

    public function invoiceList()
    {
        return Inertia::render('admin/apps/invoice/list/index');
    }

    public function issueTracker()
    {
        return Inertia::render('admin/apps/issue-tracker/index');
    }

    public function manage()
    {
        return Inertia::render('admin/apps/manage/index');
    }

    public function outlook()
    {
        return Inertia::render('admin/apps/outlook/index');
    }

    public function pinBoard()
    {
        return Inertia::render('admin/apps/pin-board/index');
    }

    public function projectsActivity()
    {
        return Inertia::render('admin/apps/projects/activity/index');
    }

    public function projectsDetails()
    {
        return Inertia::render('admin/apps/projects/details/index');
    }

    public function projectsGrid()
    {
        return Inertia::render('admin/apps/projects/grid/index');
    }

    public function projectsKanban()
    {
        return Inertia::render('admin/apps/projects/kanban/index');
    }

    public function projectsList()
    {
        return Inertia::render('admin/apps/projects/list/index');
    }

    public function projectsTeamBoard()
    {
        return Inertia::render('admin/apps/projects/team-board/index');
    }

    public function socialFeed()
    {
        return Inertia::render('admin/apps/social-feed/index');
    }

    public function usersContacts()
    {
        return Inertia::render('admin/apps/users/contacts/index');
    }

    public function usersPermissions()
    {
        return Inertia::render('admin/apps/users/permissions/index');
    }

    public function usersRoleDetails()
    {
        return Inertia::render('admin/apps/users/role-details/index');
    }

    public function usersRoles()
    {
        return Inertia::render('admin/apps/users/roles/index');
    }

    public function voteList()
    {
        return Inertia::render('admin/apps/vote-list/index');
    }
}