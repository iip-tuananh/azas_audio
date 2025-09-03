<style>
    .pagination{
        --pg-blue: #2563eb;          /* xanh chủ đạo */
        --pg-blue-600: #1d4ed8;      /* đậm hơn khi hover */
        --pg-text: #0f172a;          /* Slate-900 */
        --pg-border: #bfdbfe;        /* xanh nhạt viền */
        --pg-bg: #ffffff;

        /*display: inline-flex;*/
        align-items: center;
        gap: 8px;
        padding: 6px;
        border-radius: 12px;
        background: transparent;
        font-family: system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
        line-height: 1;
    }

    .pagination a,
    .pagination span.page-num,
    .pagination .page-btn{
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 25px;
        height: 25px;
        padding: 0 12px;
        border-radius: 10px;
        border: 1px solid var(--pg-border);
        text-decoration: none;
        font-weight: 600;
        font-size: 14px;
        color: var(--pg-text);
        background: var(--pg-bg);
        transition: transform .05s ease, background .2s ease, border-color .2s ease, color .2s ease;
    }

    /* Nút trang số */
    .pagination a.page-num:hover,
    .pagination a.page-btn:hover{
        border-color: #eff6ff !important;
        background: #2563eb !important;

    }
    .pagination a:hover {
        color: #fff !important;
    }

    .pagination a:focus-visible{
        outline: none;
        box-shadow: 0 0 0 3px rgba(37,99,235,.25);
    }

    /* Trang hiện tại */
    .pagination .is-current{
        background: var(--pg-blue) !important;
        border-color: var(--pg-blue) !important;
        color: #fff !important;
        cursor: default !important;
    }

    /* Prev/Next */
    .pagination .page-btn{
        font-weight: 700;
        padding: 0 10px;
    }

    /* Disabled */
    .pagination .is-disabled{
        pointer-events: none;
        opacity: .45;
    }

    /* Ellipsis */
    .pagination .ellipsis{
        min-width: 20px;
        border: 0;
        padding: 0 2px;
        color: #64748b; /* slate-500 */
    }

    /* Hover nhấn nhẹ */
    .pagination a:active{
        transform: translateY(1px);
    }

    /* Mobile: giữ Prev/Next + trang hiện tại + lân cận */
    @media (max-width: 520px){
        .pagination{ gap: 6px; }
        .pagination .page-num{ display: none; }
        .pagination .page-num.is-current,
        .pagination .page-num.is-near{ display: inline-flex; }
        .pagination .ellipsis{ display: none; }
        .pagination a, .pagination span{ min-width: 34px; height: 34px; padding: 0 10px; font-size: 13px; }
    }

    /* Dark mode nhẹ */
    @media (prefers-color-scheme: dark){
        .pagination{
            --pg-text: #e5e7eb;
            --pg-border: #37569c;
            --pg-bg: #0b1220;
        }
        .pagination a, .pagination span.page-num, .pagination .page-btn{
            border-color: var(--pg-border);
            background: #0b1220;
        }
        .pagination a.page-num:hover,
        .pagination a.page-btn:hover{
            background: #122347;
        }
    }
</style>
@if ($paginator->hasPages())
    <p class="pagination">
        <!-- Khối phân trang -->
        @if (!$paginator->onFirstPage())
            <a class="page-btn is-prev is-disabled" href="{{ $paginator->previousPageUrl() }}" aria-label="Trang trước" aria-disabled="true">«</a>
        @endif

        @foreach ($elements as $element)
            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="page-num is-current" aria-current="page">{{ $page }}</span>
                    @else
                        <a class="page-num is-near" href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <a class="page-btn is-next" href="{{ $paginator->nextPageUrl() }}" aria-label="Trang sau">»</a>
        @endif

    </p>
@endif

