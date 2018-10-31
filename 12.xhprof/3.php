<?php
if (extension_loaded('tideways_xhprof')) {
    tideways_xhprof_enable(TIDEWAYS_XHPROF_FLAGS_CPU | TIDEWAYS_XHPROF_FLAGS_MEMORY|TIDEWAYS_XHPROF_FLAGS_MEMORY_ALLOC_AS_MU);
	TIDEWAYS_XHPROF_FLAGS_MEMORY_ALLOC
    tideways_xhprof_disable();
}

