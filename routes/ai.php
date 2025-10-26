<?php

use Laravel\Mcp\Facades\Mcp;

Mcp::web('/mcp/email', \App\Mcp\Servers\EmailServer::class);
