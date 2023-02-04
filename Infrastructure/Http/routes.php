<?php

declare(strict_types=1);

use SpammerApi\Infrastructure\Http\ApiRoute;
use SpammerApi\Infrastructure\Http\Response;
use SpammerApi\Application\Queries\GetSubscribersQuery;
use SpammerApi\Application\Queries\GetMailingsQuery;
use SpammerApi\Application\Commands\CreateMailingDraftCommand;
use SpammerApi\Application\Commands\StartMailingCommand;
use SpammerApi\Application\Commands\StopMailingCommand;

return [
    new ApiRoute('GET', '/subscribers', function (): Response {
        /** @var GetSubscribersQuery $getSubscribersQuery */
        $getSubscribersQuery = instance(GetSubscribersQuery::class);
        $subscribers = $getSubscribersQuery($_GET['offset'] ?? 0, $_GET['length']);

        return new Response(200, ['subscribers' => $subscribers]);
    }),
    new ApiRoute('GET', '/mailings', function (): Response {
        /** @var GetMailingsQuery $getMailingsQuery */
        $getMailingsQuery = instance(GetMailingsQuery::class);
        $mailings = $getMailingsQuery();

        return new Response(200, ['mailings' => $mailings]);
    }),
    new ApiRoute('POST', '/create-mailing', function (): Response {
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
    new ApiRoute('PATCH', '/start-mailing', function (): Response {
        /** @var StartMailingCommand $startMailingCommand */
        $startMailingCommand = instance(StartMailingCommand::class);
        $startMailingCommand($_POST['mailing_id']);

        return new Response(204, []);
    }),
    new ApiRoute('PATCH', '/stop-mailing', function (): Response {
        /** @var StopMailingCommand $stopMailingCommand */
        $stopMailingCommand = instance(StopMailingCommand::class);
        $stopMailingCommand($_POST['mailing_id']);

        return new Response(204, []);
    }),
];
