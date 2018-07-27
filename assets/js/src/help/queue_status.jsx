import MailPoet from 'mailpoet';
import React from 'react';
import KeyValueTable from 'common/key_value_table.jsx';

const QueueStatus = (props) => {
  const status = props.status_data;
  return (
    <div>
      <h2>{MailPoet.I18n.t('systemStatusQueueTitle')}</h2>
      <KeyValueTable max_width={'400px'}>{
        [{
          key: MailPoet.I18n.t('status'),
          value: status.status === 'paused' ? MailPoet.I18n.t('paused') : MailPoet.I18n.t('running'),
        }, {
          key: MailPoet.I18n.t('startedAt'),
          value: status.started ? MailPoet.Date.full(status.started * 1000) : MailPoet.I18n.t('unknown'),
        }, {
          key: MailPoet.I18n.t('sentEmails'),
          value: status.sent || 0,
        }, {
          key: MailPoet.I18n.t('retryAttempt'),
          value: status.retry_attempt || MailPoet.I18n.t('none'),
        }, {
          key: MailPoet.I18n.t('retryAt'),
          value: status.retry_at ? MailPoet.Date.full(status.retry_at * 1000) : MailPoet.I18n.t('none'),
        }, {
          key: MailPoet.I18n.t('error'),
          value: status.error || MailPoet.I18n.t('none'),
        }, {
          key: MailPoet.I18n.t('totalCompletedTasks'),
          value: status.tasksStatusCounts.completed,
        }, {
          key: MailPoet.I18n.t('totalRunningTasks'),
          value: status.tasksStatusCounts.running,
        }, {
          key: MailPoet.I18n.t('totalPausedTasks'),
          value: status.tasksStatusCounts.paused,
        }, {
          key: MailPoet.I18n.t('totalScheduledTasks'),
          value: status.tasksStatusCounts.scheduled,
        }]}
      </KeyValueTable>
    </div>
  );
};

QueueStatus.propTypes = {
  status_data: React.PropTypes.shape({
    status: React.PropTypes.string,
    started: React.PropTypes.number,
    sent: React.PropTypes.number,
    retry_attempt: React.PropTypes.number,
    retry_at: React.PropTypes.number,
    tasksStatusCounts: React.PropTypes.shape({
      completed: React.PropTypes.number.isRequired,
      running: React.PropTypes.number.isRequired,
      paused: React.PropTypes.number.isRequired,
      scheduled: React.PropTypes.number.isRequired,
    }).isRequired,
  }).isRequired,
};

QueueStatus.defaultProps = {
  status_data: {
    status: null,
    started: null,
    sent: null,
    retry_attempt: null,
    retry_at: null,
  },
};

module.exports = QueueStatus;