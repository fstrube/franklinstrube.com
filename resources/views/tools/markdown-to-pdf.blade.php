<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" prefix="og: https://ogp.me/ns#">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="/favicon.ico">

        <meta name="og:description" content=" Markdown-to-PDF is a tool for converting easily-readable Markdown to beautiful PDFs. The tool runs entirely in the browser and doesn't send any of your content across the wire.">
        <meta name="og:title" content="Markdown-to-PDF Converter">
        <meta name="og:image" content="{{ url('favicon.png') }}">
        <meta name="og:type" content="article">
        <meta name="og:site_name" content="#!/bin/strube" />
        <meta name="og:url" content="{{ route('tools.markdown-to-pdf') }}">

        @routes
        @inertiaHead
        @vite(['resources/css/markdown-to-pdf.css'])
    </head>
    <body>
        @inertia
        @vite(['resources/js/markdown-to-pdf.js'])
    </body>
</html>
