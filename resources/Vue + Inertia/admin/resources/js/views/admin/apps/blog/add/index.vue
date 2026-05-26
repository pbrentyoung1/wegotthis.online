<template>
  <PageBreadcrumb title="Create Article" subtitle="Blog" />
  <BContainer fluid="xxl">
    <BRow class="justify-content-center">
      <BCol cols="12">
        <BCard no-body>
          <BCardHeader class="d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Create New Blog Post</h5>
            <small class="text-muted">Last saved: just now</small>
          </BCardHeader>

          <BCardBody>
            <BForm>
              <div class="mb-3">
                <div for="title" class="fw-semibold form-label">Post Title</div>
                <BFormInput id="title" placeholder="Enter your blog title" required />
              </div>
              <div class="mb-3">
                <div for="slug" class="fw-semibold form-label">Slug</div>
                <BFormInput id="slug" placeholder="e.g. how-to-build-a-blog-with-bootstrap" />
              </div>

              <BRow class="g-3">
                <BCol md="6">
                  <div for="author" class="fw-semibold form-label">Author</div>
                  <BFormInput id="author" placeholder="Enter author name" />
                </BCol>

                <BCol md="6">
                  <div for="publishDate" class="fw-semibold form-label">Publish Date & Time</div>
                  <FlatPickr v-model="publishDate" :config="dateConfig" class="form-control" id="publishDate" />
                </BCol>
              </BRow>

              <div class="mb-3 mt-3">
                <div for="category" class="fw-semibold form-label">Category</div>
                <BFormSelect id="category" v-model="category">
                  <option disabled value="">Select category</option>
                  <option>Technology</option>
                  <option>Design</option>
                  <option>Development</option>
                  <option>Business</option>
                  <option>Lifestyle</option>
                </BFormSelect>
              </div>

              <div class="mb-3">
                <div for="image" class="fw-semibold form-label">Featured Image</div>
                <input id="image" type="file" class="form-control" directory="false" />
                <small class="text-muted">Recommended size: 1200x600px</small>
              </div>

              <div class="mb-3">
                <div class="fw-semibold form-label">Post Content</div>
                
                  <QuillEditor v-model:content="value" :toolbar="modules" theme="snow" content-type="html" />
                
              </div>

              <div class="mb-3">
                <div for="excerpt" class="fw-semibold form-label">Excerpt (Short Summary)</div>
                <BFormTextarea id="excerpt" rows="2" placeholder="Enter a short summary for your post..." />
              </div>

              <div class="mb-3">
                <div for="tags" class="fw-semibold form-label">Tags</div>
                <BFormInput id="tags" placeholder="e.g. bootstrap, web design, ui, frontend" />
                <small class="text-muted">Separate tags with commas.</small>
              </div>

              <div class="border-top pt-3 mt-4">
                <h5 class="fw-bold text-uppercase mb-3 text-muted fs-sm">SEO Settings</h5>

                <div class="mb-3">
                  <div for="metaTitle" class="form-label">Meta Title</div>
                  <BFormInput id="metaTitle" placeholder="Enter SEO title" />
                </div>

                <div class="mb-3">
                  <div for="metaDescription" class="form-label">Meta Description</div>
                  <BFormTextarea id="metaDescription" rows="2" placeholder="Short description for search engines" />
                </div>

                <div class="mb-3">
                  <div for="metaKeywords" class="form-label">Meta Keywords</div>
                  <BFormInput id="metaKeywords" placeholder="e.g. blog, bootstrap, tutorial" />
                </div>
              </div>

              <div class="border-top pt-3 mt-4">
                <h5 class="fw-bold text-uppercase mb-3 text-muted fs-sm">Visibility</h5>
                <BFormCheckbox check class="form-check form-switch mb-2">
                  <input class="form-check-input" type="checkbox" id="featured" />
                  <div class="form-check-label" for="featured">Mark as Featured Post</div>
                </BFormCheckbox>
                <BFormCheckbox check class="form-check form-switch">
                  <input class="form-check-input" type="checkbox" id="commentsEnabled" checked />
                  <div class="form-check-label" for="commentsEnabled">Allow Comments</div>
                </BFormCheckbox>
              </div>

              <div class="mt-4 mb-3">
                <div class="form-label fw-semibold">Status</div>
                <div>
                  <BFormCheckbox check class="form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="draft" value="draft" checked />
                    <div class="form-check-label" for="draft">Draft</div>
                  </BFormCheckbox>
                  <BFormCheckbox class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="published" value="published" />
                    <div class="form-check-label" for="published">Published</div>
                  </BFormCheckbox>
                </div>
              </div>

              <div class="d-flex justify-content-center gap-2 mt-3">
                <BButton variant="outline-secondary" type="reset">Reset</BButton>
                <BButton variant="success" type="submit">Save as Draft</BButton>
                <BButton variant="primary" type="submit">Publish Post</BButton>
              </div>
            </BForm>
          </BCardBody>
        </BCard>
      </BCol>
    </BRow>
  </BContainer>
</template>

<script setup lang="ts">
import { ref } from 'vue'
import FlatPickr from 'vue-flatpickr-component'
import PageBreadcrumb from '@/components/PageBreadcrumb.vue'
const value = ref(
  `<h3>Create, manage, and publish engaging blog articles effortlessly.</h3><ul><li>Write and format posts with an intuitive rich-text editor.</li><li>Organize articles by categories, tags, and authors for easy navigation.</li><li>Built-in SEO tools to help your content rank higher on search engines.</li><li>Preview articles before publishing to ensure perfect layout and style.</li><li>Fully responsive design ensures your blog looks great on any device.</li></ul><p>The Blog Article module helps you create professional-looking posts quickly. Ideal for personal blogs, news platforms, or content-driven websites.</p>`
)

const publishDate = ref(null)
const category = ref('')
const dateConfig = { enableTime: true, dateFormat: 'd M, Y h:i', defaultDate: 'today' }

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
</script>
