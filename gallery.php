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
                <div @click="getImages" class="w-8 h-8 bg-black flex js-center hover:bg-blue-600 cursor-pointer itm-center rounded-xl text-white">
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

            </nav>
        </div>
    </header>


    <!-- main content -->

    <main class="max-w-6xl mx-auto pt-8 px-4 pb-16">

        <!-- masonry layout -->
        <section class="masonry w-full columns-1 sm:columns-2 md:columns-3 lg:columns-4 xl:columns-5 gap-4">
            <template x-for="image in images" :key="image">
                <!-- single image element -->
                <article @click="setImage(image)" class="masonry-item mb-4 bg-white rounded-lg overflow-hidden shadow-sm">
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

            <div @click.outside="closePreview" role="dialog" aria-modal="true" aria-labelledby="dialog-title" tabindex="-1"
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
                currentImg: '',
                images: [],


                // fetch async images from api
                async getImages() {
                    try {
                        const request = await fetch('images.php')
                        const response = await request.json();
                        this.images = response.images
                    } catch (error) {
                        this.error = `Something went wrong: ${error}`
                    }
                },

                setImage(image) {
                    this.preview = true;
                    this.currentImg = image;
                },

                closePreview() {
                    this.preview = false;
                    this.currentImg = '';
                }

            }
        }
    </script>

</body>

</html>