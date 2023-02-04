<?php

declare(strict_types=1);

use App\Infrastructure\Http\ApiRoute;
use App\Infrastructure\Http\Response;
use App\Application\Queries\GetSubscribersQuery;
use App\Application\Queries\GetMailingsQuery;
use App\Application\Commands\CreateMailingDraftCommand;
use App\Application\Commands\StartMailingCommand;
use App\Application\Commands\StopMailingCommand;

return [
    new ApiRoute('GET', '/api/subscribers', function (): Response {
        /** @var GetSubscribersQuery $getSubscribersQuery */
        $getSubscribersQuery = instance(GetSubscribersQuery::class);
        $subscribers = $getSubscribersQuery($_GET['offset'] ?? 0, $_GET['length']);

        return new Response(200, $subscribers);
    }),
    new ApiRoute('GET', '/api/mailings', function (): Response {
        /** @var GetMailingsQuery $getMailingsQuery */
        $getMailingsQuery = instance(GetMailingsQuery::class);
        $mailings = $getMailingsQuery();

        return new Response(200, $mailings);
    }),
    new ApiRoute('POST', '/api/create-mailing', function (): Response {
        $id = uuid4();

        /** @var CreateMailingDraftCommand $createMailingDraftCommand */
        $createMailingDraftCommand = instance(CreateMailingDraftCommand::class);
        $createMailingDraftCommand(
            $id,
            $_POST['title'],
            $_POST['message'],
            $_POST['subscriber_ids']
        );

        return new Response(201, ['id' => $id]);
    }),
    new ApiRoute('PATCH', '/api/start-mailing', function (): Response {
        /** @var StartMailingCommand $startMailingCommand */
        $startMailingCommand = instance(StartMailingCommand::class);
        $startMailingCommand($_POST['mailing_id']);

        return new Response(204, []);
    }),
    new ApiRoute('PATCH', '/api/stop-mailing', function (): Response {
        /** @var StopMailingCommand $stopMailingCommand */
        $stopMailingCommand = instance(StopMailingCommand::class);
        $stopMailingCommand($_POST['mailing_id']);

        return new Response(204, []);
    }),
];
