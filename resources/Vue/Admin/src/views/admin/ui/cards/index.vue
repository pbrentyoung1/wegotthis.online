<template>
  <PageBreadcrumb title="Cards" subtitle="Base UI" />
  <div class="container-fluid">
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-base mb-base">
      <div class="card">
        <div class="card-body">
          <p class="mb-4">Some quick example text to build on the card title and make up the bulk of the card's content. Some quick example text to build on the card title and make up.</p>
          <RouterLink to="" class="btn btn-sm bg-primary hover:bg-primary-hover text-white">Button</RouterLink>
        </div>
      </div>

      <div class="card">
        <div class="card-body">
          <h5 class="card-title mb-2.5">Basic Card with Title</h5>
          <p class="mb-4">Some quick example text to build on the card title and make up the bulk of the card's content. Some quick example text to build on the card title and make up.</p>
          <RouterLink to="" class="btn btn-sm bg-primary hover:bg-primary-hover text-white">Button</RouterLink>
        </div>
      </div>

      <div class="card bg-primary!">
        <div class="card-body">
          <h5 class="card-title mb-2.5 text-white">Card with Background Color</h5>
          <p class="mb-4 text-white">Some quick example text to build on the card title and make up the bulk of the card's content. Some quick example text to build on the card title and make up.</p>
          <RouterLink to="" class="btn btn-sm bg-default-50 hover:text-primary">Button</RouterLink>
        </div>
      </div>

      <div class="card bg-success!">
        <div class="card-body">
          <h5 class="card-title mb-2.5 text-white">Card with Background Gradient</h5>
          <p class="mb-4 text-white">Some quick example text to build on the card title and make up the bulk of the card's content. Some quick example text to build on the card title and make up.</p>
          <RouterLink to="" class="btn btn-sm bg-default-50 hover:text-primary">Button</RouterLink>
        </div>
      </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-base mb-base">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Card with Header</h4>
        </div>

        <div class="card-body">
          <h5 class="card-title mb-2.5">Special title treatment</h5>
          <p class="mb-4">With supporting text below as a natural lead-in to additional content.</p>
          <RouterLink to="" class="btn btn-sm bg-primary hover:bg-primary-hover text-white">Go somewhere </RouterLink>
        </div>
      </div>

      <div class="card">
        <div class="card-header block border-dashed">
          <h4 class="card-title mb-1.25">Card with Sub Header</h4>
          <h6 class="text-default-400 text-2xs">Card subtitle</h6>
        </div>

        <div class="card-body">
          <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
          <p>Someone famous in Source Title</p>
        </div>
      </div>

      <div class="card">
        <div class="card-header">Featured Card Title</div>

        <div class="card-body">
          <RouterLink to="" class="btn btn-sm bg-primary hover:bg-primary-hover text-white">Go somewhere </RouterLink>
        </div>

        <div class="card-footer text-default-400">2 days ago</div>
      </div>
    </div>

    <h4 class="mb-5 mt-4 text-base">Advanced Card</h4>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-base mb-base">
      <CardWithAction title="Card with Action Tools" isCloseable isCollapsible isReloadable>
        <p class="mb-4">With supporting text below as a natural lead-in to additional content.</p>
        <RouterLink to="" class="btn btn-sm bg-primary hover:bg-primary-hover text-white">Go somewhere</RouterLink>
      </CardWithAction>

      <CardWithAction className="bg-info!" cardTitleClassName="text-white" title="Card with Action Tools & Background Colors" isCloseable isCollapsible isReloadable>
        <p class="mb-4 text-white">With supporting text below as a natural lead-in to additional content.</p>
        <RouterLink to="" class="btn btn-sm hover:text-primary bg-white">Go somewhere</RouterLink>
      </CardWithAction>

      <CardWithAction title="Card with Action Tools" isCloseable isCollapsible isReloadable>
        <p class="mb-4">With supporting text below as a natural lead-in to additional content.</p>
        <RouterLink to="" class="btn btn-sm bg-primary hover:bg-primary-hover text-white">Go somewhere</RouterLink>
      </CardWithAction>
    </div>

    <h4 class="mb-5 mt-4 text-base">Bordered Card</h4>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-base mb-base">
      <div class="card border-primary border">
        <div class="card-body">
          <h4 class="card-title mb-2.5">Card with Colored Border</h4>
          <p class="mb-4">With supporting text below as a natural lead-in to additional content.</p>
          <RouterLink to="" class="btn btn-sm bg-primary hover:bg-primary-hover text-white">Button</RouterLink>
        </div>
      </div>

      <div class="card border-primary border border-dashed">
        <div class="card-body">
          <h4 class="card-title text-primary mb-3">Card with Simple Border</h4>
          <p class="mb-4">With supporting text below as a natural lead-in to additional content.</p>
          <RouterLink to="" class="btn btn-sm bg-primary hover:bg-primary-hover text-white">Button</RouterLink>
        </div>
      </div>

      <div class="card border-primary border-2">
        <div class="card-body">
          <h4 class="card-title text-primary mb-3">Card with Double Border</h4>
          <p class="mb-4">With supporting text below as a natural lead-in to additional content.</p>
          <RouterLink to="" class="btn btn-sm bg-primary hover:bg-primary-hover text-white">Button</RouterLink>
        </div>
      </div>

      <div class="card border-dark border-s-3">
        <div class="card-body">
          <h4 class="card-title text-dark mb-3">Card with Double Border</h4>
          <p class="mb-4">With supporting text below as a natural lead-in to additional content.</p>
          <RouterLink to="" class="btn btn-sm bg-dark hover:bg-primary-hover text-white">Button</RouterLink>
        </div>
      </div>

      <div class="card border-primary border-s-3">
        <div class="card-body">
          <h4 class="card-title text-primary mb-3">Card with Colored Border</h4>
          <p class="mb-4">With supporting text below as a natural lead-in to additional content.</p>
          <RouterLink to="" class="btn btn-sm bg-primary hover:bg-primary-hover text-white">Button</RouterLink>
        </div>
      </div>

      <div class="card border-info border-s-3">
        <div class="card-body">
          <h4 class="card-title mb-2.5">Card with Colored Border</h4>
          <p class="mb-4">With supporting text below as a natural lead-in to additional content.</p>
          <RouterLink to="" class="btn btn-sm bg-info hover:bg-primary-hover text-white">Button</RouterLink>
        </div>
      </div>
    </div>

    <h4 class="mb-5 mt-4 text-base">Horizontal Card</h4>

    <div class="grid grid-cols-1 xl:grid-cols-2 gap-base mb-base">
      <div class="card">
        <div class="grid grid-cols-1 items-center md:grid-cols-3">
          <div>
            <img src="/images/stock/small-1.jpg" class="rounded-s-sm" alt="..." />
          </div>

          <div class="col-span-2">
            <div class="card-body">
              <h5 class="card-title mb-2.5">Card with Horizontal Mode</h5>
              <p class="mb-4">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <p>
                <small class="text-default-400 text-2xs">Last updated 3 mins ago</small>
              </p>
            </div>
          </div>
        </div>
      </div>

      <div class="card">
        <div class="grid grid-cols-1 items-center md:grid-cols-3">
          <div class="col-span-2">
            <div class="card-body">
              <h5 class="card-title mb-2.5">Card with Horizontal Mode</h5>
              <p class="mb-4">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <p>
                <small class="text-default-400 text-2xs">Last updated 3 mins ago</small>
              </p>
            </div>
          </div>

          <div>
            <img src="/images/stock/small-2.jpg" class="rounded-e-sm" alt="..." />
          </div>
        </div>
      </div>
    </div>

    <h4 class="mb-5 mt-4 text-base">Stretched Link</h4>
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-base mb-base">
      <div class="card group">
        <RouterLink to="">
          <img src="/images/stock/small-3.jpg" class="rounded-t-sm" alt="..." />
          <div class="card-body">
            <h5 class="card-title mb-2.5">Card with stretched link</h5>
            <RouterLink to="" class="btn btn-sm bg-primary group-hover:bg-primary-hover mt-3 text-white"> Button</RouterLink>
          </div>
        </RouterLink>
      </div>

      <div class="card">
        <RouterLink to="">
          <img src="/images/stock/small-4.jpg" class="rounded-t-sm" alt="..." />
          <div class="card-body">
            <h5 class="card-title text-primary mb-3">Card with stretched link</h5>
            <p>Some quick example text to build on the card up the bulk of the card's content.</p>
          </div>
        </RouterLink>
      </div>

      <div class="card group">
        <RouterLink to="">
          <img src="/images/stock/small-5.jpg" class="rounded-t-sm" alt="..." />
          <div class="card-body">
            <h5 class="card-title mb-2.5">Card with stretched link</h5>
            <RouterLink to="" class="btn btn-sm bg-primary group-hover:bg-primary-hover mt-3 text-white"> Button</RouterLink>
          </div>
        </RouterLink>
      </div>

      <div class="card">
        <RouterLink to="">
          <img src="/images/stock/small-6.jpg" class="rounded-t-sm" alt="..." />
          <div class="card-body">
            <h5 class="card-title text-primary mb-3">Card with stretched link</h5>
            <p>Some quick example text to build on the card up the bulk of the card's content.</p>
          </div>
        </RouterLink>
      </div>
    </div>

    <h4 class="mb-5 mt-4 text-base">Card Group</h4>

    <div class="grid grid-cols-1 gap-3 md:grid-cols-3 md:gap-0 mb-base">
      <div class="card h-full md:rounded-s-sm md:rounded-e-none">
        <img class="card-img-top" src="/images/stock/small-8.jpg" alt="Card image cap" />
        <div class="card-body">
          <h5 class="card-title mb-2.5">Card title</h5>
          <p class="mb-4">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
          <p>
            <small class="text-default-400 text-2xs">Last updated 3 mins ago</small>
          </p>
        </div>
      </div>

      <div class="card h-full md:rounded-none">
        <img class="card-img-top" src="/images/stock/small-9.jpg" alt="Card image cap" />
        <div class="card-body">
          <h5 class="card-title mb-2.5">Card title</h5>
          <p class="mb-4">This card has supporting text below as a natural lead-in to additional content.</p>
          <p>
            <small class="text-default-400 text-2xs">Last updated 3 mins ago</small>
          </p>
        </div>
      </div>

      <div class="card h-full md:rounded-s-none md:rounded-e-sm">
        <img class="card-img-top" src="/images/stock/small-10.jpg" alt="Card image cap" />
        <div class="card-body">
          <h5 class="card-title mb-2.5">Card title</h5>
          <p class="mb-4">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
          <p>
            <small class="text-default-400 text-2xs">Last updated 3 mins ago</small>
          </p>
        </div>
      </div>
    </div>

    <div class="grid gap-3 rounded md:grid-cols-3 md:gap-0 mb-base">
      <div class="card h-full md:rounded-s-sm md:rounded-e-none">
        <div class="card-body flex-1">
          <h5 class="card-title mb-2.5">Card title</h5>
          <p>This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        </div>

        <div class="card-footer">
          <p>
            <small class="text-default-400 text-2xs">Last updated 3 mins ago</small>
          </p>
        </div>
      </div>

      <div class="card h-full md:rounded-none">
        <div class="card-body flex-1">
          <h5 class="card-title mb-2.5">Card title</h5>
          <p>This card has supporting text below as a natural lead-in to additional content.</p>
        </div>

        <div class="card-footer">
          <p>
            <small class="text-default-400 text-2xs">Last updated 3 mins ago</small>
          </p>
        </div>
      </div>

      <div class="card h-full md:rounded-s-none md:rounded-e-sm">
        <div class="card-body flex-1">
          <h5 class="card-title mb-2.5">Card title</h5>
          <p>This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
        </div>

        <div class="card-footer">
          <p>
            <small class="text-default-400 text-2xs">Last updated 3 mins ago</small>
          </p>
        </div>
      </div>
    </div>

    <h4 class="mb-5 mt-4 text-base">Navigation with Card</h4>

    <div class="grid grid-cols-1 xl:grid-cols-2 gap-base">
      <div class="card">
        <div class="card-header border-dashed pb-0">
          <nav class="flex">
            <RouterLink to="" class="text-primary border-default-300 rounded-t-lg border border-b-0 px-4 py-2 text-center text-sm font-medium"> Active</RouterLink>

            <RouterLink to="" class="text-default-600 px-4 py-2 font-medium">Link</RouterLink>

            <RouterLink to="" class="px-4 py-2 font-medium" disabled>Disabled</RouterLink>
          </nav>
        </div>

        <div class="card-body">
          <h5 class="text-md mb-2 text-center">Special title treatment</h5>
          <p class="mb-4 text-center">With supporting text below as a natural lead-in to additional content.</p>
          <div class="text-center">
            <RouterLink to="" class="btn btn-sm bg-primary hover:bg-primary-hover text-white">Go somewhere </RouterLink>
          </div>
        </div>
      </div>

      <div class="card">
        <div class="card-header">
          <nav class="flex">
            <RouterLink to="" class="btn btn-sm bg-primary hover:bg-primary-hover text-white">Active </RouterLink>
            <RouterLink to="" class="text-default-600 px-4 py-2 font-medium">Link</RouterLink>
            <RouterLink to="" class="px-4 py-2 font-medium" disabled>Disabled</RouterLink>
          </nav>
        </div>

        <div class="card-body">
          <h5 class="text-md mb-2 text-center">Special title treatment</h5>
          <p class="mb-4 text-center">With supporting text below as a natural lead-in to additional content.</p>

          <div class="text-center">
            <RouterLink to="" class="btn btn-sm bg-primary hover:bg-primary-hover text-white">Go somewhere </RouterLink>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { RouterLink } from "vue-router"
import CardWithAction from '~/components/CardWithAction.vue'
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
</script>
