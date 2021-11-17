<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/scheduler/v1beta1/job.proto

namespace GPBMetadata\Google\Cloud\Scheduler\V1Beta1;

class Job
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();

        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\Resource::initOnce();
        \GPBMetadata\Google\Cloud\Scheduler\V1Beta1\Target::initOnce();
        \GPBMetadata\Google\Protobuf\Duration::initOnce();
        \GPBMetadata\Google\Protobuf\Timestamp::initOnce();
        \GPBMetadata\Google\Rpc\Status::initOnce();
        \GPBMetadata\Google\Api\Annotations::initOnce();
        $pool->internalAddGeneratedFile(hex2bin(
            "0abe0b0a28676f6f676c652f636c6f75642f7363686564756c65722f7631" .
            "62657461312f6a6f622e70726f746f121e676f6f676c652e636c6f75642e" .
            "7363686564756c65722e763162657461311a2b676f6f676c652f636c6f75" .
            "642f7363686564756c65722f763162657461312f7461726765742e70726f" .
            "746f1a1e676f6f676c652f70726f746f6275662f6475726174696f6e2e70" .
            "726f746f1a1f676f6f676c652f70726f746f6275662f74696d657374616d" .
            "702e70726f746f1a17676f6f676c652f7270632f7374617475732e70726f" .
            "746f1a1c676f6f676c652f6170692f616e6e6f746174696f6e732e70726f" .
            "746f22e4060a034a6f62120c0a046e616d6518012001280912130a0b6465" .
            "736372697074696f6e18022001280912450a0d7075627375625f74617267" .
            "657418042001280b322c2e676f6f676c652e636c6f75642e736368656475" .
            "6c65722e763162657461312e507562737562546172676574480012550a16" .
            "6170705f656e67696e655f687474705f74617267657418052001280b3233" .
            "2e676f6f676c652e636c6f75642e7363686564756c65722e763162657461" .
            "312e417070456e67696e6548747470546172676574480012410a0b687474" .
            "705f74617267657418062001280b322a2e676f6f676c652e636c6f75642e" .
            "7363686564756c65722e763162657461312e487474705461726765744800" .
            "12100a087363686564756c6518142001280912110a0974696d655f7a6f6e" .
            "6518152001280912340a10757365725f7570646174655f74696d65180920" .
            "01280b321a2e676f6f676c652e70726f746f6275662e54696d657374616d" .
            "7012380a057374617465180a2001280e32292e676f6f676c652e636c6f75" .
            "642e7363686564756c65722e763162657461312e4a6f622e537461746512" .
            "220a06737461747573180b2001280b32122e676f6f676c652e7270632e53" .
            "746174757312310a0d7363686564756c655f74696d6518112001280b321a" .
            "2e676f6f676c652e70726f746f6275662e54696d657374616d7012350a11" .
            "6c6173745f617474656d70745f74696d6518122001280b321a2e676f6f67" .
            "6c652e70726f746f6275662e54696d657374616d7012410a0c7265747279" .
            "5f636f6e66696718132001280b322b2e676f6f676c652e636c6f75642e73" .
            "63686564756c65722e763162657461312e5265747279436f6e6669671233" .
            "0a10617474656d70745f646561646c696e6518162001280b32192e676f6f" .
            "676c652e70726f746f6275662e4475726174696f6e22580a055374617465" .
            "12150a1153544154455f554e5350454349464945441000120b0a07454e41" .
            "424c45441001120a0a065041555345441002120c0a0844495341424c4544" .
            "100312110a0d5550444154455f4641494c454410043a5aea41570a21636c" .
            "6f75647363686564756c65722e676f6f676c65617069732e636f6d2f4a6f" .
            "62123270726f6a656374732f7b70726f6a6563747d2f6c6f636174696f6e" .
            "732f7b6c6f636174696f6e7d2f6a6f62732f7b6a6f627d42080a06746172" .
            "67657422e2010a0b5265747279436f6e66696712130a0b72657472795f63" .
            "6f756e7418012001280512350a126d61785f72657472795f647572617469" .
            "6f6e18022001280b32192e676f6f676c652e70726f746f6275662e447572" .
            "6174696f6e12370a146d696e5f6261636b6f66665f6475726174696f6e18" .
            "032001280b32192e676f6f676c652e70726f746f6275662e447572617469" .
            "6f6e12370a146d61785f6261636b6f66665f6475726174696f6e18042001" .
            "280b32192e676f6f676c652e70726f746f6275662e4475726174696f6e12" .
            "150a0d6d61785f646f75626c696e677318052001280542790a22636f6d2e" .
            "676f6f676c652e636c6f75642e7363686564756c65722e76316265746131" .
            "42084a6f6250726f746f50015a47676f6f676c652e676f6c616e672e6f72" .
            "672f67656e70726f746f2f676f6f676c65617069732f636c6f75642f7363" .
            "686564756c65722f763162657461313b7363686564756c6572620670726f" .
            "746f33"
        ), true);

        static::$is_initialized = true;
    }
}
