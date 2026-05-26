<template>
  <PageBreadcrumb title="Text Editors" subtitle="forms" />

  <div class="container">
    <div class="grid grid-cols-1 gap-base">
      <div class="card">
        <div class="card-header block">
          <h4 class="card-title mb-1.25">Quilljs</h4>
          <p class="text-default-400">Quill is a modern WYSIWYG editor built for compatibility and extensibility</p>
        </div>

        <div class="card-body">
          <h5 class="card-title mb-1.25">Snow Editor</h5>
          <p class="mb-4 text-default-400">Snow is a clean, flat toolbar theme.</p>
          
            <QuillEditor v-model:content="content" theme="snow" content-type="html" :toolbar="modules" />
          
        </div>

        <div class="border-t border-dashed border-default-300"></div>

        <div class="card-body">
          <h4 class="card-title mb-1.25">Bubble Editor</h4>
          <p class="mb-4 text-default-400">Bubble is a simple tooltip based theme.</p>

          
            <QuillEditor v-model:content="bubbleValue" :toolbar="bubbleToolbar" theme="bubble" content-type="html" style="height: 300px" />
          
        </div>
      </div>
    </div>
  </div>
</template>

<script lang="ts" setup>
import { ref } from 'vue'
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'

const modules = [
  [{ font: [] }],
  ['bold', 'italic', 'underline', 'strike'],
  [{ color: [] }, { background: [] }],
  [{ script: 'super' }, { script: 'sub' }],
  [{ header: [false, 1, 2, 3, 4, 5, 6] }],
  ['blockquote', 'code-block'],
  [{ list: 'ordered' }, { list: 'bullet' }, { indent: '-1' }, { indent: '+1' }],
  [{ align: [] }],
  ['link', 'image', 'video'],
  ['clean'],
]

const bubbleToolbar = [['bold', 'italic', 'underline'], [{ header: 1 }, { header: 2 }], [{ list: 'ordered' }, { list: 'bullet' }], ['link']]

// Editor content

const bubbleValue = ref(
  `<h3>A powerful and responsive admin dashboard template built on Bootstrap.</h3><p><br /></p><ul><li>Fully responsive layout with a sleek and modern design.</li><li>Multiple pre-built pages such as login, registration, dashboard, charts, tables, and more.</li><li>Includes various components like modals, alerts, navigation menus, etc.</li><li>Easy to customize and extend to suit your project’s needs.</li><li>Built with Bootstrap 5x, ensuring compatibility with a wide range of devices.</li></ul><p><br /></p><p>MyAdmin Admin is the perfect choice for your next admin project. Get started today and create a stunning interface for your application.</p>`
)
const content = ref(
  `<h3>A powerful and responsive admin dashboard template built on Bootstrap.</h3><p><br /></p><ul><li>Fully responsive layout with a sleek and modern design.</li><li>Multiple pre-built pages such as login, registration, dashboard, charts, tables, and more.</li><li>Includes various components like modals, alerts, navigation menus, etc.</li><li>Easy to customize and extend to suit your project’s needs.</li><li>Built with Bootstrap 5x, ensuring compatibility with a wide range of devices.</li></ul><p><br /></p><p>MyAdmin Admin is the perfect choice for your next admin project. Get started today and create a stunning interface for your application.</p>`
)
</script>
