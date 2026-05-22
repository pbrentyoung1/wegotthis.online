@extends("shared.base", ["title" => "FAQS"])

@section("styles")
@endsection

@section("content")
    <div class="wrapper">
        @include("shared.partials.topbar", ["subtitle" => "Pages", "title" => "FAQS"]) @include("shared.partials.sidenav")

        <div class="page-content">
            <main>
                @include("shared.partials.page-title", ["subtitle" => "Pages", "title" => "FAQS"])

                <div class="container-fluid">
                    <div class="mx-auto 2xl:w-9/12">
                        <div class="my-7.5">
                            <div class="lg:w-5/12 md:w-8/12 mx-auto">
                                <div class="text-center">
                                    <h3 class="text-xl font-bold mb-7.5">Frequently Asked Questions</h3>
                                    <div class="input-icon-group mb-5">
                                        <i class="iconify tabler--search text-lg text-default-400 input-icon"></i>
                                        <input class="py-2.5 ps-10 pe-3 rounded-full text-sm w-full border border-default-300 placeholder:text-default-400 focus:border-default-500 focus:ring-0 bg-card" placeholder="Search Questions..." type="text" />
                                    </div>
                                    <div class="flex justify-center items-center gap-1.25">
                                        <h5 class="text-default-400">Popular Searches :</h5>
                                        <a class="badge bg-primary/10 rounded-full text-primary text-xs" href="#!">Apps</a>
                                        <a class="badge bg-primary/10 rounded-full text-primary text-xs" href="#!">Developers</a>
                                        <a class="badge bg-primary/10 rounded-full text-primary text-xs" href="#!">Repair</a>
                                        <a class="badge bg-primary/10 rounded-full text-primary text-xs" href="#!">Billing</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid lg:grid-cols-2 grid-cols-1 gap-base">
                            <div class="card">
                                <div class="card-header block">
                                    <h4 class="card-title mb-1.25">General</h4>
                                    <p class="text-default-400">Here are some common questions about our templates.</p>
                                </div>
                                <div class="card-body">
                                    <div class="hs-accordion-group flex flex-col gap-2">
                                        <div class="hs-accordion" id="BorderedheadingOne">
                                            <button aria-controls="BorderedcollapseOne" aria-expanded="true"
                                                class="hs-accordion-toggle bg-default-100 font-secondary flex w-full items-center justify-between rounded px-5 py-4 text-start text-sm font-semibold disabled:pointer-events-none disabled:opacity-50">
                                                What is included in your template purchase?
                                                <i class="iconify tabler--chevron-down hs-accordion-active:rotate-180 transition-transform text-base"></i>
                                            </button>
                                            <div aria-labelledby="BorderedheadingOne" class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300" id="BorderedcollapseOne" role="region">
                                                <div class="px-5 py-4">Our templates come with clean source code, comprehensive documentation, SCSS files, and starter project setups for various frameworks (e.g., React, Angular, Laravel).</div>
                                            </div>
                                        </div>
                                        <div class="hs-accordion" id="BorderedheadingTwo">
                                            <button aria-controls="BorderedcollapseTwo" aria-expanded="true"
                                                class="hs-accordion-toggle bg-default-100 font-secondary flex w-full items-center justify-between rounded px-5 py-4 text-start text-sm font-semibold disabled:pointer-events-none disabled:opacity-50">
                                                Do you offer support after purchase?
                                                <i class="iconify tabler--chevron-down hs-accordion-active:rotate-180 transition-transform text-base"></i>
                                            </button>
                                            <div aria-labelledby="BorderedheadingTwo" class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300" id="BorderedcollapseTwo" role="region">
                                                <div class="px-5 py-4">Yes! We provide 6 months of free support for bug fixes, usage questions, and minor updates. You can also extend support if needed.</div>
                                            </div>
                                        </div>
                                        <div class="hs-accordion" id="BorderedheadingThree">
                                            <button aria-controls="BorderedcollapseThree" aria-expanded="true"
                                                class="hs-accordion-toggle bg-default-100 font-secondary flex w-full items-center justify-between rounded px-5 py-4 text-start text-sm font-semibold disabled:pointer-events-none disabled:opacity-50">
                                                Can I use the template for multiple projects?
                                                <i class="iconify tabler--chevron-down hs-accordion-active:rotate-180 transition-transform text-base"></i>
                                            </button>
                                            <div aria-labelledby="BorderedheadingThree" class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300" id="BorderedcollapseThree" role="region">
                                                <div class="px-5 py-4">The standard license allows use in a single end product. For multiple projects, a separate license is required for each use case.</div>
                                            </div>
                                        </div>
                                        <div class="hs-accordion" id="BorderedheadingFour">
                                            <button aria-controls="BorderedcollapseFour" aria-expanded="true"
                                                class="hs-accordion-toggle bg-default-100 font-secondary flex w-full items-center justify-between rounded px-5 py-4 text-start text-sm font-semibold disabled:pointer-events-none disabled:opacity-50">
                                                Are the templates compatible with the latest frameworks?
                                                <i class="iconify tabler--chevron-down hs-accordion-active:rotate-180 transition-transform text-base"></i>
                                            </button>
                                            <div aria-labelledby="BorderedheadingFour" class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300" id="BorderedcollapseFour" role="region">
                                                <div class="px-5 py-4">Yes, we regularly update our templates to ensure compatibility with the latest versions of frameworks like TailwindCSS, React, Angular, Laravel, and others.</div>
                                            </div>
                                        </div>
                                        <div class="hs-accordion" id="BorderedheadingFive">
                                            <button aria-controls="BorderedcollapseFive" aria-expanded="true"
                                                class="hs-accordion-toggle bg-default-100 font-secondary flex w-full items-center justify-between rounded px-5 py-4 text-start text-sm font-semibold disabled:pointer-events-none disabled:opacity-50">
                                                Do you provide Figma or design files?
                                                <i class="iconify tabler--chevron-down hs-accordion-active:rotate-180 transition-transform text-base"></i>
                                            </button>
                                            <div aria-labelledby="BorderedheadingFive" class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300" id="BorderedcollapseFive" role="region">
                                                <div class="px-5 py-4">Yes, we include Figma or design source files with selected templates. Please check the product details or contact us if unsure.</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header block">
                                    <h4 class="card-title mb-1.25">Payments</h4>
                                    <p class="text-default-400">Here are some common questions related to billing and payment.</p>
                                </div>
                                <div class="card-body">
                                    <div class="hs-accordion-group flex flex-col gap-2">
                                        <div class="hs-accordion" id="paymentHeadingOne">
                                            <button aria-controls="paymentCollapseOne" aria-expanded="true"
                                                class="hs-accordion-toggle bg-default-100 font-secondary flex w-full items-center justify-between rounded px-5 py-4 text-start text-sm font-semibold disabled:pointer-events-none disabled:opacity-50">
                                                What payment methods do you accept?
                                                <i class="iconify tabler--chevron-down hs-accordion-active:rotate-180 transition-transform text-base"></i>
                                            </button>
                                            <div aria-labelledby="paymentHeadingOne" class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300" id="paymentCollapseOne" role="region">
                                                <div class="px-5 py-4">We accept all major credit/debit cards, PayPal, and Stripe payments. Some marketplaces may support additional methods.</div>
                                            </div>
                                        </div>
                                        <div class="hs-accordion" id="paymentHeadingTwo">
                                            <button aria-controls="paymentCollapseTwo" aria-expanded="true"
                                                class="hs-accordion-toggle bg-default-100 font-secondary flex w-full items-center justify-between rounded px-5 py-4 text-start text-sm font-semibold disabled:pointer-events-none disabled:opacity-50">
                                                Will I receive an invoice after purchase?
                                                <i class="iconify tabler--chevron-down hs-accordion-active:rotate-180 transition-transform text-base"></i>
                                            </button>
                                            <div aria-labelledby="paymentHeadingTwo" class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300" id="paymentCollapseTwo" role="region">
                                                <div class="px-5 py-4">Yes, you will receive an official invoice or receipt via email immediately after your purchase is completed.</div>
                                            </div>
                                        </div>
                                        <div class="hs-accordion" id="paymentHeadingThree">
                                            <button aria-controls="paymentCollapseThree" aria-expanded="true"
                                                class="hs-accordion-toggle bg-default-100 font-secondary flex w-full items-center justify-between rounded px-5 py-4 text-start text-sm font-semibold disabled:pointer-events-none disabled:opacity-50">
                                                Is there a refund policy?
                                                <i class="iconify tabler--chevron-down hs-accordion-active:rotate-180 transition-transform text-base"></i>
                                            </button>
                                            <div aria-labelledby="paymentHeadingThree" class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300" id="paymentCollapseThree" role="region">
                                                <div class="px-5 py-4">Yes, we follow the refund policy of the marketplace where the item was purchased. Please refer to their refund terms or contact us directly if unsure.</div>
                                            </div>
                                        </div>
                                        <div class="hs-accordion" id="paymentHeadingFour">
                                            <button aria-controls="paymentCollapseFour" aria-expanded="true"
                                                class="hs-accordion-toggle bg-default-100 font-secondary flex w-full items-center justify-between rounded px-5 py-4 text-start text-sm font-semibold disabled:pointer-events-none disabled:opacity-50">
                                                Can I upgrade my license later?
                                                <i class="iconify tabler--chevron-down hs-accordion-active:rotate-180 transition-transform text-base"></i>
                                            </button>
                                            <div aria-labelledby="paymentHeadingFour" class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300" id="paymentCollapseFour" role="region">
                                                <div class="px-5 py-4">absolutely! You can upgrade your license at any time by contacting support or purchasing the extended license separately.</div>
                                            </div>
                                        </div>
                                        <div class="hs-accordion" id="paymentHeadingFive">
                                            <button aria-controls="paymentCollapseFive" aria-expanded="true"
                                                class="hs-accordion-toggle bg-default-100 font-secondary flex w-full items-center justify-between rounded px-5 py-4 text-start text-sm font-semibold disabled:pointer-events-none disabled:opacity-50">
                                                Why was my payment declined?
                                                <i class="iconify tabler--chevron-down hs-accordion-active:rotate-180 transition-transform text-base"></i>
                                            </button>
                                            <div aria-labelledby="paymentHeadingFive" class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300" id="paymentCollapseFive" role="region">
                                                <div class="px-5 py-4">Payment failures may occur due to incorrect card info, insufficient funds, or bank restrictions. Please try another method or contact your provider.</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header block">
                                    <h4 class="card-title mb-1.25">Refunds</h4>
                                    <p class="text-default-400">Find answers related to our refund policy and conditions.</p>
                                </div>
                                <div class="card-body">
                                    <div class="hs-accordion-group flex flex-col gap-2">
                                        <div class="hs-accordion" id="refundHeadingOne">
                                            <button aria-controls="refundCollapseOne" aria-expanded="true"
                                                class="hs-accordion-toggle bg-default-100 font-secondary flex w-full items-center justify-between rounded px-5 py-4 text-start text-sm font-semibold disabled:pointer-events-none disabled:opacity-50">
                                                What is your refund policy?
                                                <i class="iconify tabler--chevron-down hs-accordion-active:rotate-180 transition-transform text-base"></i>
                                            </button>
                                            <div aria-labelledby="refundHeadingOne" class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300" id="refundCollapseOne" role="region">
                                                <div class="px-5 py-4">We offer refunds within 14 days of purchase if the template is faulty or not as described. Please review the full policy or reach out for clarification.</div>
                                            </div>
                                        </div>
                                        <div class="hs-accordion" id="refundHeadingTwo">
                                            <button aria-controls="refundCollapseTwo" aria-expanded="true"
                                                class="hs-accordion-toggle bg-default-100 font-secondary flex w-full items-center justify-between rounded px-5 py-4 text-start text-sm font-semibold disabled:pointer-events-none disabled:opacity-50">
                                                How do I request a refund?
                                                <i class="iconify tabler--chevron-down hs-accordion-active:rotate-180 transition-transform text-base"></i>
                                            </button>
                                            <div aria-labelledby="refundHeadingTwo" class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300" id="refundCollapseTwo" role="region">
                                                <div class="px-5 py-4">You can request a refund by contacting our support team with your order ID and a brief reason for the request.</div>
                                            </div>
                                        </div>
                                        <div class="hs-accordion" id="refundHeadingThree">
                                            <button aria-controls="refundCollapseThree" aria-expanded="true"
                                                class="hs-accordion-toggle bg-default-100 font-secondary flex w-full items-center justify-between rounded px-5 py-4 text-start text-sm font-semibold disabled:pointer-events-none disabled:opacity-50">
                                                Are there any non-refundable purchases?
                                                <i class="iconify tabler--chevron-down hs-accordion-active:rotate-180 transition-transform text-base"></i>
                                            </button>
                                            <div aria-labelledby="refundHeadingThree" class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300" id="refundCollapseThree" role="region">
                                                <div class="px-5 py-4">Custom services, extended licenses, and downloadable assets with confirmed usage typically aren’t refundable.</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header block">
                                    <h4 class="card-title mb-1.25">Customization</h4>
                                    <p class="text-default-400">Questions about custom development and template modifications.</p>
                                </div>
                                <div class="card-body">
                                    <div class="hs-accordion-group flex flex-col gap-2">
                                        <div class="hs-accordion" id="customHeadingOne">
                                            <button aria-controls="customCollapseOne" aria-expanded="true"
                                                class="hs-accordion-toggle bg-default-100 font-secondary flex w-full items-center justify-between rounded px-5 py-4 text-start text-sm font-semibold disabled:pointer-events-none disabled:opacity-50">
                                                Do you offer customization services?
                                                <i class="iconify tabler--chevron-down hs-accordion-active:rotate-180 transition-transform text-base"></i>
                                            </button>
                                            <div aria-labelledby="customHeadingOne" class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300" id="customCollapseOne" role="region">
                                                <div class="px-5 py-4">Yes, we offer paid customization services based on your requirements. Contact us for a quote.</div>
                                            </div>
                                        </div>
                                        <div class="hs-accordion" id="customHeadingTwo">
                                            <button aria-controls="customCollapseTwo" aria-expanded="true"
                                                class="hs-accordion-toggle bg-default-100 font-secondary flex w-full items-center justify-between rounded px-5 py-4 text-start text-sm font-semibold disabled:pointer-events-none disabled:opacity-50">
                                                Can I modify the template myself?
                                                <i class="iconify tabler--chevron-down hs-accordion-active:rotate-180 transition-transform text-base"></i>
                                            </button>
                                            <div aria-labelledby="customHeadingTwo" class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300" id="customCollapseTwo" role="region">
                                                <div class="px-5 py-4">absolutely! All templates come with full source code and documentation to help you make your own changes.</div>
                                            </div>
                                        </div>
                                        <div class="hs-accordion" id="customHeadingThree">
                                            <button aria-controls="customCollapseThree" aria-expanded="true"
                                                class="hs-accordion-toggle bg-default-100 font-secondary flex w-full items-center justify-between rounded px-5 py-4 text-start text-sm font-semibold disabled:pointer-events-none disabled:opacity-50">
                                                Will customizing the template affect support?
                                                <i class="iconify tabler--chevron-down hs-accordion-active:rotate-180 transition-transform text-base"></i>
                                            </button>
                                            <div aria-labelledby="customHeadingThree" class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300" id="customCollapseThree" role="region">
                                                <div class="px-5 py-4">Support is still available, but major custom changes may not be covered under standard support terms.</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

            @include("shared.partials.footer")
        </div>
    </div>

    @include("shared.partials.customizer")
@endsection

@section("scripts")
@endsection
