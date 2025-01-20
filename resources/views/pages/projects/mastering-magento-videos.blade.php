@extends('layouts.default')

@section('body.class', 'single')

@section('content')
    <div role="main" class="main">
        <x-article title="Video Course: Mastering Magento">
## Magento Tutorial Videos for Developers

Magento development can be hard to grasp. The learning curve is steep. Many features of Magento development are unclear. And code that you find online often isn’t explained. But don’t lose hope! I created the Mastering Magento video course to help you. These Mastering Magento tutorial videos are filled with detailed and in-depth walkthroughs. And when I say filled, I’m talking jam-packed with nearly four hours of video.

## Course Contents

The video tutorials are grouped into roughly 30-minute sections. The first two sections will have you set up a server and install Magento, and the following sections cover topics related to Magento development. By the end of the video course, you will know the ins and outs of Magento programming.

All code examples are available to download if you purchase the course. You will also get thorough line-by-line commentary as you follow along with the videos.

1. Installing Magento [27:51 minutes]
    * Preparing Your Server for Magento
    * Installing the Magento Software
    * Alternate Installation via the Command Line Prompt
    * Setting Up Multiple Storefronts
2. Extending Magento [23:06 minutes]
    * Setting Up Your Development Environment
    * Creating a Module
    * Creating a Frontend Controller
    * Creating Frontend Layouts
    * Creating Blocks and Templates
3. Extending the Admin [20:51 minutes]
    * Adding a Menu Item in the Admin
    * Adding System Configuration Fields
    * Creating Models
    * Writing Module Installation Scripts
    * Event-Handling and Observers
4. Mastering the Admin [29:07 minutes]
    * Building Forms
    * Processing Forms
    * Creating Grids
    * Editing Grid Items
    * Grid Mass Actions
    * Exporting Grid Data
5. Programming the Catalog [27:01 minutes]
    * Creating Custom Product Types
    * Adding Custom Product Attributes
    * Advanced Product Editing
    * Saving Your Product
    * Frontend Product View
6. Programming the Shopping Cart [39:31 minutes]
    * Cart Item Behavior – Part 1
    * Cart Item Behavior – Part 2
    * Controller Guest Checkout
    * Creating a Custom Payment Method
    * Adding a Step in the Checkout Process
    * Processing Orders
7. Importing and Exporting Data [17:29 minutes]
    * Introduction to the Dataflow
    * Advanced Dataflow Profiles
    * Writing Your Own Adapter
    * Importing Orders
8. Advanced Techniques [27:20 minutes]
    * Writing Shell Scripts
    * Bootstrapping Magento for External Applications
    * Debugging with Xdebug – Part 1
    * Debugging with Xdebug – Part 2
    * Debugging with Xdebug – Part 3
        </x-article>
    </div>
    <div class="comments">
        <div class="main">
            @include('partials.comments')
        </div>
    </div>
@endsection
