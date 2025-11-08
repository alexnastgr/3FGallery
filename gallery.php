<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Alpine -->
    <script src="//unpkg.com/alpinejs" defer></script>
    <link rel="stylesheet" href="./gallery.css">
    <title>3FGallery</title>
</head>

<body x-data="init()" x-init="getImages" class="bg-gray-200 text-gray-800">

    <!-- header start -->
    <header class="w-full mx-auto px-4 py-6 bg-white">
        <div class="flex items-center justify-between">
            <h1 class="text-2xl font-extrabold">3FGallery</h1>

            <!-- header buttons -->
            <nav class="flex flex-row gap-2">
                <div @click="getImages" class="w-10 h-10 bg-black flex js-center hover:bg-blue-600 cursor-pointer itm-center rounded-xl text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <g class="refresh-outline">
                            <g fill="currentColor" fill-rule="evenodd" class="Vector" clip-rule="evenodd">
                                <path d="M17.501 8.196c-1.873-3.246-6.008-4.358-9.234-2.494a6.7 6.7 0 0 0-2.804 3.137A1 1 0 1 1 3.63 8.04a8.7 8.7 0 0 1 3.637-4.07c4.188-2.42 9.544-.971 11.966 3.225a8.8 8.8 0 0 1 1.112 3.303l-1.984.25a6.8 6.8 0 0 0-.86-2.552" />
                                <path d="M21.268 7.489c.43.2.616.71.416 1.138l-1.227 2.635a1.086 1.086 0 0 1-1.445.523l-2.636-1.236a.857.857 0 1 1 .728-1.551l2.064.969l.96-2.064a.857.857 0 0 1 1.14-.414M6.499 15.804c1.873 3.246 6.008 4.358 9.234 2.494a6.7 6.7 0 0 0 2.804-3.137a1 1 0 1 1 1.833.799a8.7 8.7 0 0 1-3.637 4.07c-4.188 2.42-9.545.971-11.966-3.225a8.8 8.8 0 0 1-1.112-3.303l1.984-.25c.11.873.39 1.74.86 2.552" />
                                <path d="M2.732 16.511a.857.857 0 0 1-.416-1.138l1.227-2.635a1.086 1.086 0 0 1 1.445-.523l2.635 1.236a.857.857 0 1 1-.727 1.551l-2.064-.969l-.96 2.064a.857.857 0 0 1-1.14.414" />
                            </g>
                        </g>
                    </svg>
                </div>

                <!-- start slideshow -->
                <div @click="startSlideshow" class="w-10 h-10 bg-black flex js-center hover:bg-blue-600 cursor-pointer itm-center rounded-xl text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M20 3H4c-1.103 0-2 .897-2 2v10c0 1.103.897 2 2 2h7v3H8v2h8v-2h-3v-3h7c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2M4 15V5h16l.001 10z" />
                        <path fill="currentColor" d="m10 13l5-3l-5-3z" />
                    </svg>
                </div>


                <!-- github repository -->
                <a href="" class="w-10 h-10 bg-black flex js-center hover:bg-blue-600 cursor-pointer itm-center rounded-xl text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M21.035 5.257q1.365 1.638 1.364 3.822c0 5.277-3.002 6.824-5.823 7.279c.364.637.455 1.365.455 2.093v3.73c0 .455-.273.728-.637.728a.72.72 0 0 1-.728-.728v-3.73a2.5 2.5 0 0 0-.728-2.093l.455-1.183c2.821-.364 5.733-1.274 5.733-6.187c0-1.183-.455-2.275-1.274-3.185l-.182-.727a4.04 4.04 0 0 0 .09-2.73c-.454.09-1.364.273-2.91 1.365l-.547.09a13.3 13.3 0 0 0-6.55 0l-.547-.09C7.57 2.71 6.66 2.437 6.204 2.437c-.273.91-.273 1.91.09 2.73l-.181.727c-.91.91-1.365 2.093-1.365 3.185c0 4.822 2.73 5.823 5.732 6.187l.364 1.183c-.546.546-.819 1.274-.728 2.002v3.821a.72.72 0 0 1-.728.728a.72.72 0 0 1-.728-.728V20.18c-3.002.637-4.185-.91-5.095-2.092c-.455-.546-.819-1.001-1.274-1.092c-.09-.091-.364-.455-.273-.819s.455-.637.82-.455c.91.182 1.455.91 2 1.547c.82 1.092 1.639 2.092 4.095 1.547v-.364c-.09-.728.091-1.456.455-2.093c-2.73-.546-5.914-2.093-5.914-7.279q0-2.184 1.365-3.822c-.273-1.273-.182-2.638.273-3.73l.455-.364C5.749 1.073 7.023.8 9.66 2.437a13.7 13.7 0 0 1 6.642 0C18.851.708 20.216.98 20.398 1.072l.455.364c.455 1.274.546 2.548.182 3.821" />
                    </svg>
                </a>

            </nav>
        </div>
    </header>


    <!-- main content -->

    <main class="max-w-6xl mx-auto pt-8 px-4 pb-16">

        <!-- masonry layout -->
        <section class="masonry w-full columns-1 sm:columns-2 md:columns-3 lg:columns-4 xl:columns-5 gap-4">
            <template x-for="image in images" :key="image">
                <!-- single image element -->
                <article @click="setImage(image)" class="masonry-item mb-4  cursor-pointer hover:opacity-80  bg-white rounded-lg overflow-hidden shadow-sm">
                    <img :src="image" alt="Example 1" loading="lazy" class="w-full h-auto img-fade object-cover" />
                </article>
            </template>
        </section>


        <!-- preview image container -->
        <div x-show="preview" class="fixed inset-0 flex items-center bg-black justify-center p-4">
            <div @click="closePreview" class="absolute flex js-center itm-center text-white top-5 right-5 x-100">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 12L7 7m5 5l5 5m-5-5l5-5m-5 5l-5 5" />
                </svg>
            </div>

            <!-- prev image -->
            <div @click="prevImage" class="w-12 h-12 absolute left-20 text-white">
                <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" viewBox="0 0 20 20">
                    <path fill="currentColor" d="m4 10l9 9l1.4-1.5L7 10l7.4-7.5L13 1z" />
                </svg>
            </div>

            <!-- next image -->
            <div @click="nextImage" class="w-12 h-12 absolute right-20 rotate-140 text-white">
                <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" viewBox="0 0 20 20">
                    <path fill="currentColor" d="M7 1L5.6 2.5L13 10l-7.4 7.5L7 19l9-9z" />
                </svg>
            </div>


            <div  role="dialog" aria-modal="true" aria-labelledby="dialog-title" tabindex="-1"
                class="w-full max-w-lg mx-auto rounded-2xl  p-6 transform transition-all modal-enter modal-enter-active">

                <div class="flex items-center justify-center">
                    <img class="max-h-[90vh] max-w-[90vw] rounded-lg" :src="currentImg" />
                </div>


            </div>
        </div>
    </main>

    <!-- end main container -->

    <script>
        function init() {
            return {
                error: '',
                isLoading: true,
                preview: false,
                slideShow: false,
                currentImg: '',
                images: [],

                async getImages() {
                    try {
                        const request = await fetch('images.php');
                        const response = await request.json();
                        this.images = response.images;
                        this.isLoading = false;
                    } catch (error) {
                        this.error = `Something went wrong: ${error}`;
                        this.isLoading = false;
                    }
                },

                setImage(image) {
                    this.preview = true;
                    this.currentImg = image;
                },

                closePreview() {
                    this.preview = false;
                    this.currentImg = '';
                },

                prevImage() {
                    const currInd = this.images.indexOf(this.currentImg);
                    const newIndex = (currInd - 1 + this.images.length) % this.images.length;
                    this.currentImg = this.images[newIndex];
                },

                nextImage() {
                    const currInd = this.images.indexOf(this.currentImg);
                    const newIndex = (currInd + 1) % this.images.length;
                    this.currentImg = this.images[newIndex];
                }
            }
        }
    </script>

</body>

</html>