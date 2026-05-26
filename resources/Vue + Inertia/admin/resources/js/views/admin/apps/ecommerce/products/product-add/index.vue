<template>
  <PageBreadcrumb title="Add Product" subtitle="Ecommerce" />
  <BRow class="justify-content-center">
    <BCol xxl="10">
      <BRow>
        <BCol xxl="8">
          <BCard no-body>
            <BCardHeader class="d-block p-3">
              <h4 class="card-title mb-1">Product Information</h4>
              <p class="text-muted mb-0">To add a new product, please provide the necessary details in the fields below.</p>
            </BCardHeader>

            <BCardBody>
              <BRow>
                <BCol cols="12">
                  <div class="mb-3">
                    <label for="productName" class="form-label"> Product Name <span class="text-danger">*</span> </label>
                    <BFormInput id="productName" type="text" placeholder="Enter product name" required />
                  </div>
                </BCol>

                <BCol lg="6">
                  <div class="mb-3">
                    <label for="skuId" class="form-label"> SKU <span class="text-danger">*</span> </label>
                    <BFormInput id="skuId" type="text" placeholder="SOFA-10058" required />
                  </div>
                </BCol>

                <BCol lg="6">
                  <div class="mb-3">
                    <label for="stockNumber" class="form-label"> Stock <span class="text-danger">*</span> </label>
                    <BFormInput id="stockNumber" type="number" placeholder="250" />
                  </div>
                </BCol>

                <BCol cols="12">
                  <div>
                    <label for="description" class="form-label"> Product Description <span class="text-muted">(Optional)</span> </label>
                    
                      <QuillEditor v-model:content="value" content-type="html" :options="{ toolbar: [['bold', 'italic', 'underline', 'strike', 'blockquote', 'code-block', { list: 'ordered' }, 'link', 'image']] }" theme="snow" />
                    
                  </div>
                </BCol>
              </BRow>
            </BCardBody>
          </BCard>

          <BCard no-body>
            <BCardHeader class="d-block p-3">
              <h4 class="card-title mb-1">Product Image</h4>
              <p class="text-muted mb-0">To upload a product image, please use the option below to select and upload the relevant file.</p>
            </BCardHeader>

            <BCardBody>
              <BRow>
                <BCol cols="12">
                  <FileUploader />
                </BCol>
              </BRow>
            </BCardBody>
          </BCard>
        </BCol>

        <BCol xxl="4">
          <BCard no-body>
            <BCardHeader class="d-block p-3">
              <h4 class="card-title mb-1">Pricing</h4>
              <p class="text-muted mb-0">Set the base price and applicable discount for the product using the options below..</p>
            </BCardHeader>

            <BCardBody>
              <div class="mb-3">
                <label for="basePrice" class="form-label"
                  >Base Price <span class="text-danger"><span class="text-danger">*</span></span></label
                >
                <div class="app-search">
                  <BFormInput id="basePrice" type="number" placeholder="Enter base price (e.g., 199.99)" />
                  <Icon icon="currency-dollar" class="app-search-icon text-muted" />
                </div>
              </div>

              <div class="mb-3">
                <label for="discount" class="form-label">Discount Type <span class="text-muted">(Optional)</span></label>
                <div class="app-search">
                  <BFormSelect v-model="discountType" id="discount" placeholder="Choose Discount" class="form-control my-1 my-md-0">
                    <option value="All">Choose Discount</option>
                    <option value="Furniture">No Discount</option>
                    <option value="Electronics">Flat Discount</option>
                    <option value="Fashion">Percentage Discount</option>
                  </BFormSelect>
                  <Icon icon="discount" class="app-search-icon text-muted" />
                </div>
              </div>

              <div class="mb-0">
                <label for="discountValue" class="form-label">Discount Value <span class="text-muted">(Optional)</span></label>
                <div class="app-search">
                  <BFormInput id="discountValue" type="number" placeholder="Enter discount amount or percentage" />
                  <Icon icon="tag" class="app-search-icon text-muted" />
                </div>
              </div>
            </BCardBody>
          </BCard>

          <BCard no-body>
            <BCardHeader class="d-block p-3">
              <h4 class="card-title mb-1">Organize</h4>
              <p class="text-muted mb-0">Organize your product by selecting the appropriate brand, category, sub-category, status, and tags.</p>
            </BCardHeader>

            <div class="card-body">
              <div class="mb-3">
                <label for="brand" class="form-label">Brand</label>
                <div class="app-search">
                  <input type="text" class="form-control" id="brand" placeholder="Enter brand name" />
                  <Icon icon="stack-2" class="app-search-icon text-muted" />
                </div>
              </div>

              <div class="mb-3">
                <label for="category" class="form-label">Category <span class="text-danger">*</span></label>
                <div class="app-search">
                  <BFormSelect v-model="category" class="form-control my-1 my-md-0" id="category">
                    <option value="All">Choose Category</option>
                    <option value="Furniture">Furniture</option>
                    <option value="Electronics">Electronics</option>
                    <option value="Fashion">Fashion</option>
                  </BFormSelect>
                  <Icon icon="category" class="app-search-icon text-muted" />
                </div>
              </div>

              <div class="mb-3">
                <label for="subCategory" class="form-label">Sub Category <span class="text-danger">*</span></label>
                <div class="app-search">
                  <BFormSelect v-model="subCategory" class="form-control my-1 my-md-0" id="subCategory">
                    <option value="All">Choose Sub Category</option>
                    <option value="Chairs">Chairs</option>
                    <option value="Sofas">Sofas</option>
                    <option value="Tables">Tables</option>
                  </BFormSelect>
                  <Icon icon="list-check" class="app-search-icon text-muted" />
                </div>
              </div>

              <div class="mb-3">
                <label for="statusOne" class="form-label">Status <span class="text-danger">*</span></label>
                <div class="app-search">
                  <BFormSelect v-model="status" class="form-control my-1 my-md-0" id="statusOne">
                    <option value="All">Choose Status</option>
                    <option value="Published">Published</option>
                    <option value="Inactive">Inactive</option>
                    <option value="Schedule">Schedule</option>
                    <option value="Draft">Draft</option>
                  </BFormSelect>
                  <Icon icon="wand" class="app-search-icon text-muted" />
                </div>
              </div>

              <div class="mb-0">
                <label for="tags" class="form-label">Tags</label>
                <div class="app-search">
                  <BFormInput type="text" id="tags" placeholder="Enter tags separated by commas" />
                  <Icon icon="tag" class="app-search-icon text-muted" />
                </div>
              </div>
            </div>
          </BCard>
        </BCol>
      </BRow>

      <div class="mt-2 mb-4 d-flex gap-2 justify-content-center">
        <BButton variant="danger" class="fw-semibold"> Discard </BButton>
        <BButton variant="secondary"> Save as Draft</BButton>
        <BButton variant="success"> Publish </BButton>
      </div>
    </BCol>
  </BRow>
</template>

<script setup lang="ts">
import { BButton, BCard, BCardBody, BCardHeader, BCol, BFormInput, BFormSelect, BRow } from 'bootstrap-vue-next'
import { ref } from 'vue'
import FileUploader from '@/components/FileUploader.vue'
import PageBreadcrumb from '@/components/PageBreadcrumb.vue'
import Icon from '@/components/wrappers/Icon.vue'

const category = ref('All')
const subCategory = ref('All')
const status = ref('All')
const discountType = ref('All')

const value = ref(
  `<p>Introducing the <strong><em>Azure Comfort Single Sofa</em></strong>, a perfect blend of modern design and luxurious comfort.</p><p>This premium blue single sofa is designed to elevate any living space with its sleek profile and rich, durable fabric. It’s the perfect seating option for your living room, lounge area, or cozy reading nook.</p><ul><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span>Crafted with a solid mahogany frame for enhanced durability.</li><li data-list="bullet"><span class="ql-ui" contenteditable="false"></span>Upholstered in a high-quality blue fabric that offers both style and comfort.</li></ul>`
)
</script>
