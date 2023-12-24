<table>
    <thead>
    <tr>
        <th>Question ID</th>
        <th>Relational Intelligence</th>
        <th>Establishing Rapport</th>
        <th>Understanding Others</th>
        <th>Embracing Individual Differences</th>
        <th>Developing Trust</th>
        <th>Cultivating Influence</th>
        <th>Lacking Self Awareness</th>
        <th>Lacking Social Awareness</th>
        <th>Self-Serving</th>
        <th>Breaking Trust</th>
        <th>Poor Management of Emotions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($reports->survey_answers as $surveyAnswer)
        <tr>
            <td>{{ $surveyAnswer->question_id }}</td>
            <td>{{ $surveyAnswer->ri_points }}</td>
            <td>{{ $surveyAnswer->establishing_report_point }}</td>
            <td>{{ $surveyAnswer->understanding_others_point }}</td>
            <td>{{ $surveyAnswer->embracing_individual_differences_point }}</td>
            <td>{{ $surveyAnswer->developing_trust_point }}</td>
            <td>{{ $surveyAnswer->cultivating_influence_point }}</td>
            <td>{{ $surveyAnswer->lacking_self_awareness_point }}</td>
            <td>{{ $surveyAnswer->lacking_social_awareness_point }}</td>
            <td>{{ $surveyAnswer->self_serving_point }}</td>
            <td>{{ $surveyAnswer->breaking_trust_point }}</td>
            <td>{{ $surveyAnswer->poor_management_of_emotions_point }}</td>
        </tr>
    @endforeach
        <tr>
            <td></td>
            <td>{{ $reports->survey->ri_points }}</td>
            <td>{{ $reports->survey->establishing_report}}</td>
            <td>{{ $reports->survey->understanding_others }}</td>
            <td>{{ $reports->survey->embracing_individual_differences }}</td>
            <td>{{ $reports->survey->developing_trust }}</td>
            <td>{{ $reports->survey->cultivating_influence }}</td>
            <td>{{ $reports->survey->lacking_self_awareness }}</td>
            <td>{{ $reports->survey->lacking_social_awareness }}</td>
            <td>{{ $reports->survey->self_serving }}</td>
            <td>{{ $reports->survey->breaking_trust }}</td>
            <td>{{ $reports->survey->poor_management_of_emotions }}</td>
        </tr>
        <tr>
            <td></td>
            <td>{{ report_multiple_by_100($reports->survey->ri_points)}}</td>
            <td>{{ report_multiple_by_100($reports->survey->establishing_report)}}</td>
            <td>{{ report_multiple_by_100($reports->survey->understanding_others) }}</td>
            <td>{{ report_multiple_by_100($reports->survey->embracing_individual_differences)}}</td>
            <td>{{ report_multiple_by_100($reports->survey->developing_trust) }}</td>
            <td>{{ report_multiple_by_100($reports->survey->cultivating_influence) }}</td>
            <td>{{ report_multiple_by_100($reports->survey->lacking_self_awareness) }}</td>
            <td>{{ report_multiple_by_100($reports->survey->lacking_social_awareness) }}</td>
            <td>{{ report_multiple_by_100($reports->survey->self_serving) }}</td>
            <td>{{ report_multiple_by_100($reports->survey->breaking_trust) }}</td>
            <td>{{ report_multiple_by_100($reports->survey->poor_management_of_emotions) }}</td>
        </tr>
        <tr>
            <td></td>
            <td>{{ report_multiple_by_100($reports->survey->ri_points,0) }}</td>
            <td>{{ report_multiple_by_100($reports->survey->establishing_report,0 )}}</td>
            <td>{{ report_multiple_by_100($reports->survey->understanding_others,0 ) }}</td>
            <td>{{ report_multiple_by_100($reports->survey->embracing_individual_differences,0 )}}</td>
            <td>{{ report_multiple_by_100($reports->survey->developing_trust,0 ) }}</td>
            <td>{{ report_multiple_by_100($reports->survey->cultivating_influence,0 ) }}</td>
            <td>{{ report_multiple_by_100($reports->survey->lacking_self_awareness,0 ) }}</td>
            <td>{{ report_multiple_by_100($reports->survey->lacking_social_awareness,0) }}</td>
            <td>{{ report_multiple_by_100($reports->survey->self_serving,0)}}</td>
            <td>{{ report_multiple_by_100($reports->survey->breaking_trust,0) }}</td>
            <td>{{ report_multiple_by_100($reports->survey->poor_management_of_emotions,0) }}</td>
        </tr>
    </tbody>
</table>
